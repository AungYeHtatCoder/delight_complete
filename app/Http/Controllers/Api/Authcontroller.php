<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function login(LoginRequest $request)
    {
        //  $credentials = $request->validated();
        // if (!Auth::attempt($credentials)) {
        //     return response([
        //         'message' => 'Provided email or password is incorrect'
        //     ], 422);
        // }
        // /** @var \App\Models\User $user */
        // $user = Auth::user();
        // $token = $user->createToken('main')->plainTextToken;
        // return response(compact('user', 'token'));
        return response(['message' => 'This is a test']);
    }

    // public function logout()
    // {
    //     /** @var \App\Models\User $user */
    //     $user = Auth::user();
    //     $user->tokens()->delete();
    //     return response([
    //         'message' => 'Logged out'
    //     ]);
    // }

    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ]);
    }
}