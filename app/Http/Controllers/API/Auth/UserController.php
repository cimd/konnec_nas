<?php

namespace App\Http\Controllers\API\Auth;

// use App\Mail\ResetPasswordMail;
use App\Models\Auth\User;
use Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
// use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController
{
    use SendsPasswordResetEmails;

    public function index(Request $request): JsonResponse
    {
        $users = User::select(['id', 'name'])
            ->orderBy('name')
            ->get();

        return response()->json($users);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('konnec-token')->plainTextToken;

            return [
                'user' => $user->toArray(),
                'token' => $token,
            ];
        } else {
            return response()->json('Error logging in', 400);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json('logout', 201);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('konnec-token')->plainTextToken;

        return [
            'user' => $user->toArray(),
            'token' => $token,
        ];
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return [
            'data' => $user->toArray(),
        ];
    }

    public function show($id)
    {
        $user = User::find($id);
        $token = $user->createToken('konnec-token')->plainTextToken;

        return [
            'user' => $user->toArray(),
            'token' => $token,
        ];
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $token = str_random(60);
        DB::table('password_resets')
            ->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        $user->spsResetPassword($user->email, $token);

        return [
            'message' => 'We have e-mailed your password reset link!',
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
        $result = $this->login(new Request($req));

        return $result;
    }
}
