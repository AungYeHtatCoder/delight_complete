<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.plan.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //Validate the form data
        $validatedData = $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_code' => 'required|string|max:255',
            'price' => 'required',
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
          return redirect()->route('admin.plans.index')->with('toast_success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $plan = Plan::findOrFail($id);
    $services = Service::all();
    return view('admin.plan.show', compact('plan', 'services'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan_update_data = Plan::with('services')->find($id);
        $services = Service::all();
        return view('admin.plan.edit', compact('plan_update_data','services'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_code' => 'required|string|max:255',
            'price' => 'required',
            'services' => 'array|nullable',
        ]);

        // Find the plan
        $plan = Plan::findOrFail($id);

        // Update the plan name and code
        $plan->update([
            'plan_name' => $validatedData['plan_name'],
            'plan_code' => $validatedData['plan_code'],
            'price' => $validatedData['price'],
        ]);

        // Sync services to the plan with quantities
        if (!empty($validatedData['services'])) {
            $servicesWithQuantities = [];

            foreach ($validatedData['services'] as $serviceId => $quantity) {
                if ($quantity >= 0) {
                    $servicesWithQuantities[$serviceId] = ['qty' => $quantity];
                }
            }

            // Sync services to the plan with quantities
            $plan->services()->sync($servicesWithQuantities);
        } else {
            // If no services are selected, detach all services
            $plan->services()->detach();
        }

        return redirect()->route('admin.plans.index')->with('toast_success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);

        // Delete the plan
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('toast_success', 'Plan deleted successfully.');
    }
}