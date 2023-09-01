<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionsResource;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return response([
            'data' => PermissionsResource::collection($permissions)
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return response([
            'data' => new PermissionsResource($permission)
        ], Response::HTTP_CREATED);
    }

    public function show(Permission $permission)
    {
        return response([
            'data' => new PermissionsResource($permission)
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return response([
            'data' => new PermissionsResource($permission)
        ], Response::HTTP_OK);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}