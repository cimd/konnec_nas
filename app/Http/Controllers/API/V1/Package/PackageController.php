<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class PackageController extends Controller
{
    public function test () {
        $result = Artisan::command('command:test', function (){});
        dd($result);
        return true;
    }
}
