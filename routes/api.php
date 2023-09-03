<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\SampleController;
use App\Http\Controllers\Api\ApiHomeController;
use App\Http\Controllers\Api\OurTeamController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PlansApiController;
use App\Http\Controllers\Api\ApiHomePageController;
use App\Http\Controllers\Api\PermissionsController;
use App\Http\Controllers\Api\EventCalendarApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/home', function (Request $request) {
//    // return  ApiHomeController @index;
//    // return with event
//     return $request->event();

// });
// / route 
Route::get('/', [ApiHomePageController::class, 'index']);
// sample route
Route::get('/sample/{name}', [ApiHomePageController::class, 'sample']);
//Route::get('/sample', [ApiHomePageController::class, 'sample']);
Route::get('/pricing', [ApiHomePageController::class, 'pricing']);
Route::get('/team', [ApiHomePageController::class, 'team']);
Route::get('/clients', [ApiHomePageController::class, 'clients']);
//Route::post('/login', [Authcontroller::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logoutUser']);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/home', [ApiHomeController::class, 'index']);
// });
// admin routes group
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['auth:sanctum']
], function () {
    // Other Admin routes Add Here
    Route::get('/home', [ApiHomeController::class, 'index']);

    //Route::apiResource('/plans', PlansApiController::class);
    // plans get routes @index 
    Route::get('/plans', [PlansApiController::class, 'index']);
    // plans post routes @store
    Route::post('/plans', [PlansApiController::class, 'store']);
    // plans get routes @show
    Route::get('/plans/{plan}', [PlansApiController::class, 'show']);
    // plans put routes @update
    Route::put('/plans/{plan}', [PlansApiController::class, 'update']);
    // plans delete routes @destroy
    Route::delete('/plans/{plan}', [PlansApiController::class, 'destroy']);
    Route::apiResource('/users', UsersController::class);
    Route::apiResource('/permissions', PermissionsController::class);
    Route::apiResource('/roles', RolesController::class);
    Route::apiResource('/our_clients', ClientController::class);
    Route::apiResource('/our_teams', OurTeamController::class);
    Route::apiResource('/samples', SampleController::class);
    Route::post('/logout', [Authcontroller::class, 'logout']);
    // services routes
    Route::apiResource('/services', ServiceController::class);

    // event calendar routes start
    Route::get('events', [EventCalendarApiController::class, 'index']);
    Route::post('events/action', [EventCalendarApiController::class, 'action']);
    Route::get('events/clients', [EventCalendarApiController::class, 'clients']);
    Route::get('events/client/{id}', [EventCalendarApiController::class, 'clientCalendar']);
    Route::post('events/client/{id}/action', [EventCalendarApiController::class, 'clientCalendarAction']);
    Route::get('events/profile', [EventCalendarApiController::class, 'profile']);
    Route::get('events/detail/{id}', [EventCalendarApiController::class, 'eventDetail']);
    // event calendar routes end
});

// any routes group