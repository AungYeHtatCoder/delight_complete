<?php

use App\Http\Controllers\Admin\EventCalendarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventNotificationController;

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::name('admin.')->group(function () {
    // rotues middleware admin group
    Route::middleware(['auth'])->group(function () {
        Route::get('/user-noti', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('user-noti');
    Route::post('/mark-as-read', [App\Http\Controllers\Admin\HomeController::class, 'markNotification'])->name('markNotification');
        // permission resource routes
        Route::resource('/permissions',App\Http\Controllers\Admin\PermissionController::class);
        // role resource routes
        Route::resource('/roles', App\Http\Controllers\Admin\RolesController::class);
        // user resource routes
        Route::resource('/users', App\Http\Controllers\Admin\UsersController::class);
        // profile resource rotues
        Route::resource('/profiles', App\Http\Controllers\Admin\ProfileController::class);
        // plan resources route
        Route::resource('/plans', App\Http\Controllers\Admin\PlansController::class);
        // service resources route
        Route::resource('/services', App\Http\Controllers\Admin\ServiceController::class);


        // content-calendar routes
        Route::get('/full-calendar', [EventCalendarController::class, 'index']);
        Route::post('/full-calendar/action', [EventCalendarController::class, 'action']);
        Route::get('/clients', [EventCalendarController::class, 'clients']);
        Route::get('/client-calendar/{id}', [EventCalendarController::class,'clientCalendar']);
        Route::post('/client-calendar/action/{id}', [EventCalendarController::class,'clientCalendarAction']);
        Route::get('/profile', [EventCalendarController::class, 'profile']);

        Route::get('/full-calendar/event{id}', [EventCalendarController::class, 'eventDetail']);

        //service sample crud
        Route::get('/samples', [SampleController::class, 'index']);
        Route::get('/samples/create', [SampleController::class, 'create']);
        Route::post('/samples/create', [SampleController::class, 'store']);
        Route::get('/samples/edit/{id}', [SampleController::class, 'edit']);
        Route::post('/samples/edit/{id}', [SampleController::class, 'update']);
        Route::get('/samples/delete/{id}', [SampleController::class, 'delete']);


        // Define a route for adding an event
        Route::post('/add-event', [EventNotificationController::class, 'addEvent']);

        // Define a route for sending event notifications
        Route::get('/send-event-notification/{userId}/{eventData}', [EventNotificationController::class, 'sendEventNotification']);

    });

});
