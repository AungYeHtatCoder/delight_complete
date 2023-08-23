<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Role;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
class EventCalendarController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('user_id', Auth::user()->id)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('admin.calendar.calendar');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'user_id'   =>  Auth::user()->id
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'user_id'   =>  Auth::user()->id
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }

    public function clients()
    {
        $users = User::whereHas('roles', function($query) {
            $query->where('title', 'Customer');
        })->latest()->get();
    	return view('admin.calendar.clients', compact('users'));
    }

    public function clientCalendar(Request $request, $id)
    {
        $user = User::find($id);
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('user_id', $id)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('admin.calendar.client-calendar', compact('user'));
    }

    public function clientCalendarAction(Request $request, $id)
    {
        if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
        'user_id'   =>  $id
    			]);
							// Dispatch event notification
            $user = User::find($id);
            $user->notify(new EventNotification($event));

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'user_id'   =>  $id
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }

    public function profile(Request $request){
        if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('user_id', Auth::user()->id)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('admin.profile');
    }

    public function eventDetail($id)
    {
        $event = Event::find($id);
        if(!$event){
            return redirect('/home');
        }elseif(Auth::user()->id !== $event->user_id){
            return redirect('/home');
        }
        return view('customer.profile.eventDetail', compact('event'));
    }
}