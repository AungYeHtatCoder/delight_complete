<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_name' => 'required|unique:services,service_name',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        // Store the service
        Service::create([
            'service_name' => $request->service_name,
            // Add other fields here as needed
        ]);

        return redirect()->route('admin.services.index')->with('toast_success', 'Service
          created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);

    return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service_update_data = Service::findOrFail($id);
        return view('admin.services.edit', compact('service_update_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'service_name' => 'required|unique:services,service_name,' . $service->id,
    ]);

    if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->first())->withInput();
    }

    // Update the plan
    $service->update([
        'service_name' => $request->service_name,
    ]);

    return redirect()->route('admin.services.index')->with('toast_success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $service = Service::findOrFail($id);

    // Delete the plan
    $service->delete();

    return redirect()->route('admin.services.index')->with('toast_success', 'Service deleted successfully.');
    }
}