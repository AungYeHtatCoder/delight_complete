<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SampleController;
use App\Http\Controllers\Admin\EventCalendarController;
use App\Http\Controllers\Admin\EventNotificationController;
use App\Http\Controllers\Home\HomePageController;

Auth::routes();

//frontend routes
Route::get('/', [HomePageController::class, 'index']);
Route::get('/about-us', [HomePageController::class, 'about']);
Route::get('/our-services', [HomePageController::class, 'service']);
Route::get('/pricing', [HomePageController::class, 'pricing']);
Route::get('/our-teams', [HomePageController::class, 'team']);
Route::get('/our-clients', [HomePageController::class, 'clients']);
Route::get('/contact-us', [HomePageController::class, 'contact']);
Route::post('/sendMail', [HomePageController::class, 'sendMail']);

Route::get('/login', [HomePageController::class, 'login']);
//service sample pages
Route::get('/service-samples/{name}', [HomePageController::class, 'sample']);


//frontend routes



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->group(function () {
    // rotues middleware admin group
    Route::middleware(['auth'])->group(function () {
        // user registration notification routes
        Route::get('/user-noti', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('user-noti');
        // mark as read user registration notification routes
    Route::post('/mark-as-read', [App\Http\Controllers\Admin\HomeController::class, 'markNotification'])->name('markNotification');
        // get event notification routes
        Route::get('/get-event-notification', [App\Http\Controllers\Admin\GetEventNotificationController::class, 'index'])->name('get-event-notification');
        // mark as read event notification routes
        Route::post('/mark-event-as-read', [App\Http\Controllers\Admin\GetEventNotificationController::class, 'markEventNotification'])->name('markEventNotification');
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

        // our_client resource rotues
        Route::resource('/our_clients', App\Http\Controllers\Admin\OurClientsController::class);

        // our_team resource rotues
        Route::resource('/our_teams', App\Http\Controllers\Admin\OurteamsController::class);


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

        Route::get('/samples/{name}/', [SampleController::class, 'detail']);


        // Define a route for adding an event
        Route::post('/add-event', [EventNotificationController::class, 'addEvent']);

        // Define a route for sending event notifications
        Route::get('/send-event-notification/{userId}/{eventData}', [EventNotificationController::class, 'sendEventNotification']);

    });

});