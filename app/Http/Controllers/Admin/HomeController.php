<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        $services = Service::all();

        return view('admin.user_noti.index', compact('notifications', 'services'));
    }

    public function markNotification(Request $request)
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
