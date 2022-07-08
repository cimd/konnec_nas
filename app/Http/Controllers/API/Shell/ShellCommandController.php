<?php

namespace App\Http\Controllers\API\Shell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class ShellCOmmandController extends Controller
{

    public function run(Request $request)
    {
        Artisan::call('run:command "' . $request->command . '"');
        $result = Artisan::output();
        return $result;
    }
}
