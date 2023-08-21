<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Admin\OurClient;
use App\Models\Admin\OurTeams;
use App\Models\Admin\Plan;
use App\Models\Admin\Sample;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    public function index(){
        $budget = Plan::with('services')->where('plan_code', "BASIC")->first();
        $advance = Plan::with('services')->where('plan_code', "ADVANCE")->first();
        $smart = Plan::with('services')->where('plan_code', "SMART")->first();

        $clients = OurClient::all();
        $teams = OurTeams::take(4)->get();

        // return $budget;
        return view('welcome', compact('budget', 'advance', 'smart', 'clients', 'teams'));
    }

    public function about(){
        return view('frontend.about-us');
    }

    public function service(){
        return view('frontend.service');
    }

    public function sample($name){
        if($name === "motion_video"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Motion Video');
            })->get();
            $service = Service::where('service_name', 'Motion Video')->first();
            return view('frontend.sample', compact('samples', 'service'));
        }
        if($name === "art_photo"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Art Photo')->orWhere('service_name', 'Art Comic');
            })->get();
            $service = Service::where('service_name', 'Art Photo')->first();
            return view('frontend.sample', compact('samples', 'service'));
        }
        if($name === "graphic"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Graphic Photo');
            })->get();
            $service = Service::where('service_name', 'Graphic Photo')->first();
            return view('frontend.sample', compact('samples', 'service'));
        }
        if($name === "content"){
            $samples = Sample::whereHas('service', function($query) {
                $query->where('service_name', 'Content');
            })->get();
            $service = Service::where('service_name', 'Content')->first();
            return view('frontend.sample', compact('samples', 'service'));
        }
    }


    public function pricing(){
        $budget = Plan::with('services')->where('plan_code', "BASIC")->first();
        $advance = Plan::with('services')->where('plan_code', "ADVANCE")->first();
        $smart = Plan::with('services')->where('plan_code', "SMART")->first();

        return view('frontend.pricing', compact('budget', 'advance', 'smart'));
    }

    public function team(){
        $teams = OurTeams::all();
        return view('frontend.team', compact('teams'));
    }

    public function clients(){
        $clients = OurClient::all();
        return view('frontend.client', compact('clients'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    //sendMail
    public function sendMail(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $toMail = "wailinnkyaw03@gmail.com";
        $mail = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message'=> $request->message,
        ];
        // return $message;
        Mail::to($toMail)->send(new SendMail($mail));
        return redirect()->back()->with('success', 'Mail Sent Successfully.');
    }

    public function login(){
        return view('frontend.login');
    }

}
