<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\OurTeams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class OurteamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $our_teams = OurTeams::all();
        return view('admin.our_team.index', compact('our_teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:our_teams,name',
        'position' => 'required|unique:our_teams,position',
        'bio' => 'required|unique:our_teams,bio|max:255',
        'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
        $name = $request->input('name');
        $position = $request->input('position');
        $bio = $request->input('bio');
        $profile_img = $request->file('profile_img')->store('team_profile', 'uploads');

        OurTeams::create(['name' => $name, 
        'position' => $position,
        'bio' => $bio,
        'image' => $profile_img]);

        return redirect()->route('admin.our_teams.index')->with('toast_success', 'Our Team Member created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $our_team_detail = OurTeams::find($id);
        return view('admin.our_team.show', compact('our_team_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $our_team_edit = OurTeams::find($id);
        return view('admin.our_team.edit', compact('our_team_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $our_team = OurTeams::findOrFail($id);
        $name = $request->input('name');
        $position = $request->input('position');
        $bio = $request->input('bio');

        // Update client name
        $our_team->name = $name;
        $our_team->position = $position;
        $our_team->bio = $bio;

        // Update logo if a new one is provided
        if ($request->hasFile('profile_img')) {
            $this->updateProfile($our_team, $request->file('profile_img'));
        }

        $our_team->save();

        return redirect()->route('admin.our_teams.index')->with('toast_success', 'Our Team Member updated successfully.');
    }

     protected function updateProfile(OurTeams $our_team, $profile_img)
    {
        // Delete the old logo if exists
        if ($our_team->image) {
            Storage::disk('uploads')->delete($our_team->image);
        }

        // Store the new logo
        $logoPath = $profile_img->store('team_profile', 'uploads');
        $our_team->image = $logoPath;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $our_team = OurTeams::findOrFail($id);
        $our_team->delete();
        return redirect()->route('admin.our_teams.index')->with('toast_success', 'Our Team Member deleted successfully.');
    }
}