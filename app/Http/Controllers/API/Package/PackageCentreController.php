<?php

namespace App\Http\Controllers\API\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use App\Models\Package;
// use App\Events\TerminalMessage;

class PackageCentreController extends Controller
{
    public function index(Request $request)
    {
        $result = Package::with('dependency')->get();
        // TerminalMessage::dispatch('test');
        return $result->toArray();
    }

    public function update(Request $request, $id)
    {
        $result = Package::find($id);
        $result->fill($request->all())->save();
        return $result->toArray();
    }

    public function show($id)
    {
        $result = Package::with('dependency')->find($id);
        return $result->toArray();
    }

    public function test()
    {
        Artisan::call('command:test');
        $result = Artisan::output();
        return $result;
    }

    public function install(Request $request)
    {
        switch ($request->name) {
            case 'Mosquitto':
                Artisan::call('mosquitto:install');
                break;
            case 'Test':
                // Artisan::call('app:test');
                break;
            default:
                break;
        }
        $result = true;
        return $result;
    }

    public function remove(Request $request)
    {
        switch ($request->name) {
            case 'Lollypop':
                Artisan::call('remove:lollypop');
                break;
        }
        $result = Artisan::output();
        return $result;
    }
}
