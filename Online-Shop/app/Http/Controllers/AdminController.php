<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRequest;
use App\Http\Resources\adminResource;
use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(adminRequest $adminRequest)
    {
       $admin=admin::create($adminRequest->all());
        $token = $admin->createToken('auth_token')->plainTextToken;

        return response()->json([
           "message" => "Created!",
           "token" => $token,
           "date" => new adminResource($admin)
        ],200);

    }
}
