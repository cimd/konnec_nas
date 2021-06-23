<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class PackageController extends Controller
{
    public function test () {
        $result = Artisan::call('command:test');
        $result2 = Artisan::output(); 
        // dd($result);
        return $result2;
    }
}
