<?php

namespace App\Http\Controllers;

use App\Http\Requests\cartReq;
use App\Http\Resources\cartRes;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(cartReq $request)
    {
        $Cart=Cart::create($request->all());
        return response()->json([
           'message' => 'Product added to cart',
           'data' => new cartRes($Cart)
        ],201);
    }

    public function show(Cart $cart)
    {
        return response()->json([
            'massage' => 'Product added to cart',
            'data' => new cartRes($cart)
        ],200);
    }

    public function update(Cart $cart,cartReq $request)
    {
        $cart->update($request->validated());
        $cart->refresh();
        return response()->json([
            'message' => 'Cart updated successfully',
            'data' => new cartRes($cart)
        ],200);
    }

    public function delete(Cart $cart)
    {
        return response()->json([
            'message' => 'Cart deleted successfully',
        ],200);
    }
}
