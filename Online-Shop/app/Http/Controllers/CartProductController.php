<?php

namespace App\Http\Controllers;

use App\Http\Requests\cartProductReq;
use App\Http\Resources\cartProductRes;
use App\Models\cartproduct;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function store(cartProductReq $cartProductReq)
    {
        $cartProduct=cartproduct::create($cartProductReq->validated());
        return response()->json([
            'message'=>'success',
            'data'=>new cartProductRes($cartProduct)
        ],201);
    }

    public function show(cartProduct $cartProduct){
        return response()->json([
            'message'=>'success',
            'data'=>new cartProductRes($cartProduct)
        ],200);
    }

    public function update(cartproduct $cartProduct, cartProductReq $cartProductReq)
    {
        $cartProduct->update($cartProductReq->all());
        $cartProduct->refresh();
        return response()->json([
            'message'=>'success',
            'data'=>new cartProductRes($cartProduct)
        ],200);
    }

    public function delete(cartproduct $cartProduct){
        $cartProduct->delete();
        return response()->json([
            'message'=>'success',
        ],200);
    }
}
