<?php

namespace App\Http\Controllers\Api;

use App\Mail\SendMail;
use App\Models\Admin\Plan;
use App\Models\Admin\Sample;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Admin\OurTeams;
use App\Models\Admin\OurClient;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\SampleResource;
use App\Http\Resources\NewPlanResource;
use App\Http\Resources\OurTeamResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\OurClientResource;
use App\Http\Resources\NewServiceResource;

class ApiHomePageController extends Controller
{
    public function index()
    {
        $budget = Plan::with('services')->where('plan_code', "BASIC")->first();
        $advance = Plan::with('services')->where('plan_code', "ADVANCE")->first();
        $smart = Plan::with('services')->where('plan_code', "SMART")->first();

        $clients = OurClient::all();
        $teams = OurTeams::take(4)->get();

        return response()->json([
            'budget' => new PlanResource($budget),
            'advance' => new PlanResource($advance),
            'smart' => new PlanResource($smart),
            'clients' => OurClientResource::collection($clients),
            'teams' => OurTeamResource::collection($teams),
        ]);
    }

    // public function sample(Request $request)
    // {
    // $name = $request->query('name', null);
    // $samples = null;
    // $service = null;

    // if ($name === "motion_video") {
    //     $samples = Sample::whereHas('service', function ($query) {
    //         $query->where('service_name', 'Motion Video');
    //     })->get();
    //     $service = Service::where('service_name', 'Motion Video')->first();
    // } elseif ($name === "art_photo") {
    //     $samples = Sample::whereHas('service', function ($query) {
    //         $query->where('service_name', 'Art Photo')->orWhere('service_name', 'Art Comic');
    //     })->get();
    //     $service = Service::where('service_name', 'Art Photo')->first();
    // } elseif ($name === "graphic") {
    //     $samples = Sample::whereHas('service', function ($query) {
    //         $query->where('service_name', 'Graphic Photo');
    //     })->get();
    //     $service = Service::where('service_name', 'Graphic Photo')->first();
    // } elseif ($name === "content") {
    //     $samples = Sample::whereHas('service', function ($query) {
    //         $query->where('service_name', 'Content');
    //     })->get();
    //     $service = Service::where('service_name', 'Content')->first();
    // }

    //  return response()->json([
    //     'samples' => $samples ? SampleResource::collection($samples) : null,
    //     'service' => $service ? new NewServiceResource($service) : null,
    // ]);
    // }



    public function sample($name)
{
    $samples = null;
    $service = null;
    
    if ($name === "motion_video") {
        $samples = Sample::whereHas('service', function ($query) {
            $query->where('service_name', 'Motion Video');
        })->get();
        $service = Service::where('service_name', 'Motion Video')->first();
    } elseif ($name === "art_photo") {
        $samples = Sample::whereHas('service', function ($query) {
            $query->where('service_name', 'Art Photo')->orWhere('service_name', 'Art Comic');
        })->get();
        $service = Service::where('service_name', 'Art Photo')->first();
    } elseif ($name === "graphic") {
        $samples = Sample::whereHas('service', function ($query) {
            $query->where('service_name', 'Graphic Photo');
        })->get();
        $service = Service::where('service_name', 'Graphic Photo')->first();
    } elseif ($name === "content") {
        $samples = Sample::whereHas('service', function ($query) {
            $query->where('service_name', 'Content');
        })->get();
        $service = Service::where('service_name', 'Content')->first();
    }
    
    // Return JSON response
    return response()->json([
        'samples' => SampleResource::collection($samples),
        'service' => new NewServiceResource($service),
    ]);
}


    public function pricing()
{
    $budget = Plan::with('services')->where('plan_code', "BASIC")->first();
    $advance = Plan::with('services')->where('plan_code', "ADVANCE")->first();
    $smart = Plan::with('services')->where('plan_code', "SMART")->first();

    return response()->json([
        'budget' => new NewPlanResource($budget),
        'advance' => new NewPlanResource($advance),
        'smart' => new NewPlanResource($smart)
    ]);
}

    public function team()
    {
        $teams = OurTeams::all();
        return OurTeamResource::collection($teams);
    }

    public function clients()
    {
        $clients = OurClient::all();
        return OurClientResource::collection($clients);
    }

    

}