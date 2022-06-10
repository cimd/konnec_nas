<?php

namespace App\Http\Controllers\API\V1\Auth;

// use App\Mail\ResetPasswordMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\Role;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class UserController
{
    use SendsPasswordResetEmails;

    public function index(Request $request)
    {
        $users = Cache::rememberForever('users', function () {
            return User::select(['id', 'name', 'configs_locations_id'])
                        ->orderBy('name')
                        ->get();
        });
        return response()->json($users);
    }

    public function login(Request $request)
    {
        // dd($request->username);
        if (Auth::attempt(['username' =>  $request->username, 'password' =>  $request->password])) {
            // dd('yes');
            $user = Auth::user();
            $roles = DB::table('role_user')->where('user_id', $user->id)->get();
            $user->role = $roles[0]->role_id * 1;
            $token = $user->createToken('sps-token')->plainTextToken;
            // dd('here');
            return [
                'user' => $user->toArray(),
                'roles' => $roles->toArray(),
                'token' => $token
            ];
        }
        else {
            return response()->json('Error logging in', 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json('logout', 201);
    }

    public function store(Request $request)
    {
        $user = User::create([
          'name'     => $request->name,
          'username'     => $request->username,
          'configs_locations_id'     => $request->configs_locations_id,
          'email'    => $request->email,
          'password' => bcrypt($request->password),
        ]);
        $user
           ->roles()
           ->attach(Role::where('id', 10)->first());

        $roles = DB::table('role_user')->where('user_id', $user->id)->get();
        $user->role = $roles[0]->id;

        $token = $user->createToken('sps-token')->plainTextToken;

        // $this->setAndRetrieveUsersCache();

        return [
            'user' => $user->toArray(),
            'roles' => $roles->toArray(),
            'token' => $token
        ];
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        // $this->setAndRetrieveUsersCache();

        return [
            'data' => $user->toArray()
        ];
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = DB::table('role_user')->where('user_id', $id)->get();
        $user->role = $roles[0]->role_id;
        $token = $user->createToken('sps-token')->plainTextToken;
        return [
            'user' => $user->toArray(),
            'roles' => $roles->toArray(),
            'token' => $token
        ];
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email',$request->email)->firstOrFail();
        $token = str_random(60);
        DB::table('password_resets')
            ->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        $user->spsResetPassword($user->email, $token);
        return [
            'message' => 'We have e-mailed your password reset link!'
        ];

    }

    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->save();

        $user->tokens()->delete();

        $req = [];
        $req['username'] = $user->username;
        $req['password'] = $request->password; 
        $result = $this->login(new Request ($req));
        return $result;
    }
    
    // private function setAndRetrieveUsersCache ()
    // {
    //     $users = User::select(['id', 'name', 'configs_locations_id'])
    //                     ->orderBy('name')
    //                     ->get();
    //     Cache::put('users', $users);
    //     return $users;
    // }

}