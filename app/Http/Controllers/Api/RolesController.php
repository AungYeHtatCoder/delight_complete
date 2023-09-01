<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RolesResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return response([
            'data' => RolesResource::collection($roles)
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return response([
            'data' => new RolesResource($role)
        ], Response::HTTP_CREATED);
    }

    public function show(Role $role)
    {
        return response([
            'data' => new RolesResource($role)
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return response([
            'data' => new RolesResource($role)
        ], Response::HTTP_OK);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}