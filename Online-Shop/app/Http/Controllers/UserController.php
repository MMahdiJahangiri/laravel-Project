<?php

namespace App\Http\Controllers;

use App\Http\Requests\userStoreReq;
use App\Http\Resources\userStoreRes;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(userStoreReq $userStoreReq)
    {
        $User=User::create($userStoreReq->all());
        $token = $User->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'اطلاعات کاربری با موفقیت ثبت شد',
            'token' => $token,
            'data'=> new userStoreRes($User)
        ],200);
    }

    public function show(user $user)
    {
        return response()->json([
            'message' => 'اطلاعات کاربری با موفقیت ثبت شد',
            'data'=> new userStoreRes($user)
        ],200);
    }

    public function update()
    {

    }
}
