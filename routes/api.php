<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\V1\Package\PackageCentreController;
use App\Http\Controllers\API\V1\Package\ApacheController;
use App\Http\Controllers\API\V1\Shell\ShellCommandController;

use App\Http\Controllers\API\TimelineGalleryController;
use App\Http\Controllers\API\PhotoController;
use App\Http\Controllers\API\PathController;
use App\Http\Controllers\API\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->group(function () {
    // Route::post('login', 'V1\Auth\UserController@login');
    // Route::apiResource('users', 'V1\Auth\UserController');
    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::post('logout', 'V1\Auth\UserController@logout');
    // });
    // Route::post('users/forgot-password', 'V1\Auth\UserController@forgotPassword');
    // Route::post('users/reset-password', 'V1\Auth\UserController@resetPassword');

    Route::post('packages/test', [PackageCentreController::class, 'test']);
    Route::post('packages/install', [PackageCentreController::class, 'install']);
    Route::post('packages/remove', [PackageCentreController::class, 'remove']);
    Route::apiResource('packages', PackageCentreController::class);

    Route::prefix('package')->group(function () {
        Route::prefix('apache')->group(function () {
            Route::get('list-envs', [ApacheController::class, 'listEnvs']);
            Route::get('get-file', [ApacheController::class, 'getFile']);
            Route::post('update-file', [ApacheController::class, 'updateFile']);
        });

    });
    Route::post('shell/run', [ShellCommandController::class, 'run']);



    Route::apiResources([
        'timeline-galleries' => TimelineGalleryController::class,
        'photos' => PhotoController::class,
        'paths' => PathController::class,
    ]);
    Route::patch('rename/{photo}', [PhotoController::class, 'rename']);
    Route::patch('exif/{photo}', [PhotoController::class, 'exif']);
});