<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\V1\Package\PackageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::post('login', 'V1\Auth\UserController@login');
    Route::apiResource('users', 'V1\Auth\UserController');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', 'V1\Auth\UserController@logout');
    });
    Route::post('users/forgot-password', 'V1\Auth\UserController@forgotPassword');
    Route::post('users/reset-password', 'V1\Auth\UserController@resetPassword');

    Route::get('package/test', [PackageController::class, 'test']);
});