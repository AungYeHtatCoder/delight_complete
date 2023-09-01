<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\OurClient;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = OurClient::all();
        return response([
            'data' => ClientResource::collection($clients)
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $client = OurClient::create($request->all());
        return response([
            'data' => new ClientResource($client)
        ], Response::HTTP_CREATED);
    }

    public function show(OurClient $client)
    {
        return response([
            'data' => new ClientResource($client)
        ], Response::HTTP_OK);
    }

    public function update(Request $request, OurClient $client)
    {
        $client->update($request->all());
        return response([
            'data' => new ClientResource($client)
        ], Response::HTTP_OK);
    }

    public function destroy(OurClient $client)
    {
        $client->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}