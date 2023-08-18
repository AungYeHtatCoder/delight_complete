<?php

namespace App\Providers;

use App\Models\User; // 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\Notification;

class UsersNotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer([
            'admin.profile.index',
            'admin.calendar.calendar',
            'admin.calendar.client-calendar',
            'admin.calendar.clients',
            'admin.permission.index',
            'admin.permission.create',
            'admin.permission.edit',
            'admin.permission.show',
            'admin.roles.create',
            'admin.roles.edit',
            'admin.roles.show',
            'admin.roles.index',
            'admin.users.index',
            'admin.users.create',
            'admin.users.edit',
            'admin.users.show',
            'admin.profile.index',
            'admin.our_client.index',
            'admin.our_client.create',
            'admin.our_client.edit',
            'admin.our_client.show',
            'admin.plan.index',
            'admin.plan.create',
            'admin.plan.edit',
            'admin.plan.show',
            'admin.services.index',
            'admin.services.create',
            'admin.services.edit',
            'admin.services.show',
            'admin.samples.index',
            'admin.samples.create',
            'admin.samples.edit',
        ], function ($view) {
            if (auth()->check() && auth()->user()->is_admin) {
                $notifications = DB::table('notifications')
                    ->where('notifiable_id', auth()->user()->id)
                    ->where('notifiable_type', User::class)
                    ->orderBy('created_at', 'desc')
                    ->get(); 
                $view->with('notifications', $notifications);
            }
        });
    }
}