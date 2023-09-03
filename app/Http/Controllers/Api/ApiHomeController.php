<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EventResource;

class ApiHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum'); // Use API middleware for authentication.
    }

   public function index(Request $request)
    {
        if ($request->ajax()) {
            $events = Event::whereDate('start', '>=', $request->start)
                           ->whereDate('end', '<=', $request->end)
                           ->where('user_id', Auth::user()->id)
                           ->get();
            return response()->json($events);

        }
    }

}