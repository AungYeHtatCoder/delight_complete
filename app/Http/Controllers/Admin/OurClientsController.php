<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\OurClient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $our_clients = OurClient::latest()->get();
        return view('admin.our_client.index', compact('our_clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'client_name' => 'required|unique:our_clients,client_name',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
        $client_name = $request->input('client_name');
        $logoPath = $request->file('logo')->store('logos', 'uploads');

        OurClient::create(['client_name' => $client_name, 'logo' => $logoPath]);

        return redirect()->route('admin.our_clients.index')->with('toast_success', 'Our Client created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $our_client_detail = OurClient::find($id);
        return view('admin.our_client.show', compact('our_client_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $our_client_edit = OurClient::find($id);
        return view('admin.our_client.edit', compact('our_client_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
    {
        $our_client = OurClient::findOrFail($id);
        $client_name = $request->input('client_name');

        // Update client name
        $our_client->client_name = $client_name;

        // Update logo if a new one is provided
        if ($request->hasFile('logo')) {
            $this->updateLogo($our_client, $request->file('logo'));
        }

        $our_client->save();

        return redirect()->route('admin.our_clients.index')->with('toast_success', 'Our Client updated successfully.');
    }

    protected function updateLogo(OurClient $our_client, $logoFile)
    {
        // Delete the old logo if exists
        if ($our_client->logo) {
            Storage::disk('uploads')->delete($our_client->logo);
        }

        // Store the new logo
        $logoPath = $logoFile->store('logos', 'uploads');
        $our_client->logo = $logoPath;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $our_client = OurClient::findOrFail($id);
        $our_client->delete();
        return redirect()->route('admin.our_clients.index')->with('toast_success', 'Our Client deleted successfully.');
    }
}
