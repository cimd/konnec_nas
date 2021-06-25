<?php

namespace App\Http\Controllers\API\V1\Shell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
// use App\Models\Package;
// use App\Jobs\ApacheRestartJob;

class ShellCOmmandController extends Controller
{


    public function run (Request $request) {
        Artisan::call('run:command ' . $request->command);
        $result = Artisan::output();
        return $result;
    }
}