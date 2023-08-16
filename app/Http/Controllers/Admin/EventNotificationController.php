<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\EventAddNotification;

class EventNotificationController extends Controller
{
    public function addEvent(Request $request)
{
    // ... create event logic ...

    $user = auth()->user(); // Retrieve the authenticated user
    $user->notify(new EventAddedNotification());
}
    public function sendEventNotification($userId, $eventData)
    {
        $user = User::find($userId); // Get the user who should receive the notification
        $user->notify(new EventAddedNotification($eventData)); // Trigger the notification
    }
}