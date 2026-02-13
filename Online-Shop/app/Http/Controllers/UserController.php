<?php

namespace App\Http\Controllers;

use App\Http\Requests\userReq;
use App\Http\Resources\userRes;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(userReq $userReq)
    {
        $user = User::create($userReq->all());
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User created successfully',
            'token' => $token,
            'data' => new userRes($user)
        ], 201);
    }

    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'message' => 'User retrieved successfully',
            'data' => new userRes($user)
        ], 200);
    }

    public function update(userReq $userReq)
    {

        $user = $userReq->user();
        $user->update($userReq->all());
        $user->refresh();

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new userRes($user)
        ], 200);
    }

    public function delete(Request $request)
    {
        $user = $request->user();
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ], 200);
    }
}
