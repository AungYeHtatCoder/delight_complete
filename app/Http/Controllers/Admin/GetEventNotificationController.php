<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
class GetEventNotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        //dd($notifications);

        return view('admin.event_noti.index', compact('notifications'));
    }

    public function markEventNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}