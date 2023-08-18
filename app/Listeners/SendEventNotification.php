<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\EventNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEventNotification
{
    /**
     * Create the event listener.
     */
    

    /**
     * Handle the event.
     */
    public function handle(object $event)
    {
        $customer = User::whereHas('roles', function ($query) {
                $query->where('id', 2);
            })->get();

        Notification::send($customer, new EventNotification($event->user));
    }
}