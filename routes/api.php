<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\Api\PlansApiController;

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
});