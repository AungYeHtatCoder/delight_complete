<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Event;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
         if (auth()->user()->hasRole('Admin')) {
        return view('admin.profile.index');
    } else {
        if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
					   ->where('user_id', Auth::user()->id)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
        return view('customer.profile.index');
    }
    }

    
}