<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Models\Admin\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
    // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden |You cannot  Access this page because you do not have permission');
        
    // // Users data with order by id desc
    // $users = User::orderBy('id', 'desc')->with('roles')->get();

    // return response()->json([
    //     'success' => true,
    //     'message' => 'Users fetched successfully',
    //     'data' => $users,
    // ], Response::HTTP_OK);
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden | You cannot access this page because you do not have permission');
    
    // Users data with order by id desc
    $users = User::orderBy('id', 'desc')->with('roles')->get();

    return response()->json([
        'success' => true,
        'message' => 'Users fetched successfully',
        'data' => UsersResource::collection($users),
    ], Response::HTTP_OK);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden | You cannot Access this page because you do not have permission');
    
    $roles = Role::all()->pluck('title', 'id');

    return response()->json([
        'success' => true,
        'message' => 'Roles fetched successfully',
        'data' => $roles
    ], Response::HTTP_OK);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'roles' => 'required|array',
        'roles.*' => 'exists:roles,id'
    ]);

    try {
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign roles to the user
        $user->roles()->sync($validatedData['roles']);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_CREATED);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'User creation failed',
            'error' => $e->getMessage()
        ], Response::HTTP_BAD_REQUEST);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Check if the user has permission to view the details
    if (Gate::denies('user_show')) {
        return response()->json([
            'success' => false,
            'message' => '403 Forbidden | You cannot access this page because you do not have permission'
        ], Response::HTTP_FORBIDDEN);
    }

    try {
        // Find the user details along with roles and permissions
        $user_detail = User::with(['roles', 'roles.permissions'])->findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();

        return response()->json([
            'success' => true,
            'message' => 'User details fetched successfully',
            'data' => [
                'user' => $user_detail,
                'roles' => $roles,
                'permissions' => $permissions
            ]
        ], Response::HTTP_OK);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'User not found',
            'error' => $e->getMessage()
        ], Response::HTTP_NOT_FOUND);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while retrieving user details',
            'error' => $e->getMessage()
        ], Response::HTTP_BAD_REQUEST);
    }
}

    /**
     * Show the form for editing the specified resource.
     */
   

public function edit(string $id)
{
    if (Gate::denies('user_edit')) {
        return response()->json([
            'success' => false,
            'message' => '403 Forbidden | You cannot access this page because you do not have permission',
        ], Response::HTTP_FORBIDDEN);
    }

    $user_edit = User::find($id);
    $roles = Role::all();

    return response()->json([
        'success' => true,
        'user' => $user_edit,
        'roles' => $roles,
    ], Response::HTTP_OK);
}

public function update(Request $request, string $id)
{
    try {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'user' => $user,
        ], Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'User update failed',
            'error' => $e->getMessage(),
        ], Response::HTTP_BAD_REQUEST);
    }
}

public function destroy(string $id)
{
    if (Gate::denies('user_delete')) {
        return response()->json([
            'success' => false,
            'message' => '403 Forbidden | You cannot access this page because you do not have permission',
        ], Response::HTTP_FORBIDDEN);
    }

    try {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully',
        ], Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'User deletion failed',
            'error' => $e->getMessage(),
        ], Response::HTTP_BAD_REQUEST);
    }
}

}