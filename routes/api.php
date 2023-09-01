<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\SampleController;
use App\Http\Controllers\Api\OurTeamController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PlansApiController;
use App\Http\Controllers\Api\PermissionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [Authcontroller::class, 'login']);
// admin routes group
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['auth:sanctum']
], function () {
    // Other Admin routes Add Here
    Route::apiResource('/plans', PlansApiController::class);
    Route::apiResource('/users', UsersController::class);
    Route::apiResource('/permissions', PermissionsController::class);
    Route::apiResource('/roles', RolesController::class);
    Route::apiResource('/our_clients', ClientController::class);
    Route::apiResource('/our_teams', OurTeamController::class);
    Route::apiResource('/samples', SampleController::class);
    Route::post('/logout', [Authcontroller::class, 'logout']);
    // services routes
    Route::apiResource('/services', ServiceController::class);
});