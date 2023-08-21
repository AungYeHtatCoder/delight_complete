<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurClient;
use App\Models\Admin\Plan;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $budget = Plan::with('services')->where('plan_code', "BASIC")->first();
        $advance = Plan::with('services')->where('plan_code', "ADVANCE")->first();
        $smart = Plan::with('services')->where('plan_code', "SMART")->first();

        $clients = OurClient::all();


        // return $budget;
        return view('welcome', compact('budget', 'advance', 'smart', 'clients'));
    }
}
