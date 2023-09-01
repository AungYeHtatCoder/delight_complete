<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\OurTeams;
use App\Http\Controllers\Controller;
use App\Http\Resources\OurTeamResource;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = OurTeams::all();
        return response([
            'data' => OurTeamResource::collection($teams)
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $team = OurTeams::create($request->all());
        return response([
            'data' => new OurTeamResource($team)
        ], Response::HTTP_CREATED);
    }

    public function show(OurTeams $team)
    {
        return response([
            'data' => new OurTeamResource($team)
        ], Response::HTTP_OK);
    }

    public function update(Request $request, OurTeams $team)
    {
        $team->update($request->all());
        return response([
            'data' => new OurTeamResource($team)
        ], Response::HTTP_OK);
    }

    public function destroy(OurTeams $team)
    {
        $team->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}