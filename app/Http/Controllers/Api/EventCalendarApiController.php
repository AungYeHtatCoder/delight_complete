<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Role;
use App\Models\Admin\Event;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EventNotification;
class EventCalendarApiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $events = Event::whereDate('start', '>=', $request->start)
                           ->whereDate('end', '<=', $request->end)
                           ->where('user_id', Auth::user()->id)
                           ->get();

            return EventResource::collection($events);
        }
    }

    public function action(Request $request)
{
    $event = null; // Initialize $event to null

    if ($request->ajax()) {
        if ($request->type == 'add') {
            $event = Event::create([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
                'user_id' => Auth::user()->id
            ]);

            return new EventResource($event);
        }

        if ($request->type == 'update') {
            $event = Event::find($request->id);
            if ($event) {
                $event->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'user_id' => Auth::user()->id
                ]);
            }

            return new EventResource($event);
        }

        if ($request->type == 'delete') {
            $event = Event::find($request->id);
            if ($event) {
                $event->delete();
            }

            return response()->json(['message' => 'Event deleted']);
        }
    }

    // This will only run if no event was created, updated, or deleted
    return response()->json(['message' => 'Invalid request'], 400);
}


    public function clients()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('title', 'Customer');
        })->latest()->get();

        return new UserCollection($users);
    }

    public function clientCalendar(Request $request, $id)
    {
        if ($request->ajax()) {
            $events = Event::whereDate('start', '>=', $request->start)
                           ->whereDate('end', '<=', $request->end)
                           ->where('user_id', $id)
                           ->get();

            return EventResource::collection($events);
        }
    }

   public function clientCalendarAction(Request $request, $id)
{
    $event = null; // Initialize $event to null

    if ($request->ajax()) {
        if ($request->type == 'add') {
            $event = Event::create([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
                'user_id' => $id
            ]);

            // Dispatch event notification
            $user = User::find($id);
            if ($user) {
                $user->notify(new EventNotification($event));
            }

            return response()->json(new EventResource($event));
        }

        if ($request->type == 'update') {
            $event = Event::find($request->id);
            if ($event) {
                $event->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'user_id' => $id
                ]);
            }

            return response()->json(new EventResource($event));
        }

        if ($request->type == 'delete') {
            $event = Event::find($request->id);
            if ($event) {
                $event->delete();
            }

            return response()->json(['message' => 'Event deleted']);
        }
    }

    // This will only run if no event was created, updated, or deleted
    return response()->json(['message' => 'Invalid request'], 400);
}


    public function profile(Request $request)
    {
        if ($request->ajax()) {
            $events = Event::whereDate('start', '>=', $request->start)
                           ->whereDate('end', '<=', $request->end)
                           ->where('user_id', Auth::user()->id)
                           ->get();

            return EventResource::collection($events);
        }
    }

    public function eventDetail($id)
{
    $event = Event::find($id);

    // Check if event exists
    if (!$event) {
        return response()->json(['message' => 'Event not found'], 404);
    }

    // Check if the authenticated user owns the event
    if ($event->user_id == Auth::user()->id) {
        return new EventResource($event);
    }

    // Unauthorized access
    return response()->json(['message' => 'Unauthorized'], 401);
}

}