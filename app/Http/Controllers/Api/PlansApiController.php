<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanCollection;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PlansApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden |You cannot  Access this page because you do not have permission');
        $plans = Plan::all();
        return new PlanCollection($plans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'plan_name' => 'required|string|max:255',
        'plan_code' => 'required|string|max:255',
        'price' => 'required|numeric',
        'services' => 'array|nullable',
    ]);

    // Create the plan
    $plan = Plan::create([
        'plan_name' => $validatedData['plan_name'],
        'plan_code' => $validatedData['plan_code'],
        'price' => $validatedData['price'],
    ]);

    // Attach selected services to the plan with quantities
    if (!empty($validatedData['services'])) {
        $servicesWithQuantities = [];

        foreach ($validatedData['services'] as $serviceId => $quantity) {
            if ($quantity >= 0) {
                $servicesWithQuantities[$serviceId] = ['qty' => $quantity];
            }
        }

        // Attach services to the plan with quantities
        $plan->services()->attach($servicesWithQuantities);
    }

    // Return the newly created plan as a resource
    if($plan) {
        return response()->json([
            'success' => true,
            'message' => 'Plan created successfully',
            'data' => $plan
        ], Response::HTTP_OK);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Plan creation failed',
        ], Response::HTTP_BAD_REQUEST);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $plan = Plan::findOrFail($id);
        $services = Service::all();
        // api 
        if($plan) {
            return response()->json([
                'success' => true,
                'message' => 'Plan fetched successfully',
                'data' => $plan
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Plan not found',
            ], Response::HTTP_NOT_FOUND);
        }
        
        
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $plan_update_data = Plan::with('services')->find($id);
    $services = Service::all();

    if ($plan_update_data) {
        return response()->json([
            'success' => true,
            'message' => 'Plan and services fetched successfully',
            'data' => [
                'plan' => $plan_update_data,
                'services' => $services
            ]
        ], Response::HTTP_OK);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Plan not found',
        ], Response::HTTP_NOT_FOUND);
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'plan_name' => 'required|string|max:255',
        'plan_code' => 'required|string|max:255',
        'price' => 'required',
        'services' => 'array|nullable',
    ]);

    $plan = Plan::find($id);

    if ($plan) {
        $plan->update([
            'plan_name' => $validatedData['plan_name'],
            'plan_code' => $validatedData['plan_code'],
            'price' => $validatedData['price'],
        ]);

        if (!empty($validatedData['services'])) {
            $servicesWithQuantities = [];

            foreach ($validatedData['services'] as $serviceId => $quantity) {
                if ($quantity >= 0) {
                    $servicesWithQuantities[$serviceId] = ['qty' => $quantity];
                }
            }

            $plan->services()->sync($servicesWithQuantities);
        } else {
            $plan->services()->detach();
        }

        return response()->json([
            'success' => true,
            'message' => 'Plan updated successfully',
            'data' => $plan
        ], Response::HTTP_OK);

    } else {
        return response()->json([
            'success' => false,
            'message' => 'Plan not found',
        ], Response::HTTP_NOT_FOUND);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // plan delete api
        $plan = Plan::findOrFail($id);
        if($plan) {
            $plan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Plan deleted successfully',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Plan not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}