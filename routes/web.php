<?php

use App\Http\Controllers\Admin\EventCalendarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::name('admin.')->group(function () {
    // rotues middleware admin group
    Route::middleware(['auth'])->group(function () {
        // permission resource routes
        Route::resource('/permissions',App\Http\Controllers\Admin\PermissionController::class);
        // role resource routes
        Route::resource('/roles', App\Http\Controllers\Admin\RolesController::class);
        // user resource routes
        Route::resource('/users', App\Http\Controllers\Admin\UsersController::class);
        // profile resource rotues
        Route::resource('/profiles', App\Http\Controllers\Admin\ProfileController::class);
        // plan resources route


        // content-calendar routes
        Route::get('/full-calendar', [EventCalendarController::class, 'index']);
        Route::post('/full-calendar/action', [EventCalendarController::class, 'action']);
        Route::get('/clients', [EventCalendarController::class, 'clients']);
        Route::get('/client-calendar/{id}', [EventCalendarController::class,'clientCalendar']);
        Route::post('/client-calendar/action/{id}', [EventCalendarController::class,'clientCalendarAction']);
        Route::get('/profile', [EventCalendarController::class, 'profile']);
        
        Route::get('/full-calendar/event{id}', [EventCalendarController::class, 'eventDetail']);


    });

});
