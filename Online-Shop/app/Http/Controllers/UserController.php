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
        $token = $userReq->createToken('auth_token')->plainTextToken;
        $user = User::create($userReq->all());
        return response()->json([
            'message' => 'User created successfully',
            'token' => $token,
            'data' => new userRes($user)
        ],201);

    }
    public function show(User $user){
        return response()->json([
            'message' => 'User retrieved successfully',
            'data' => new userRes($user)
        ],200);
    }

    public function update(Request $request)
    {
        $user = $request->user();  // گرفتن کاربر از توکن Sanctum

        $user->update($request->all());
        $user->refresh();

        return response()->json([
            'message' => 'User updated successfully',
            'data' => new userRes($user)
        ]);
    }

}
