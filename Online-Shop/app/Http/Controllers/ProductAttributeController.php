<?php

namespace App\Http\Controllers;

use App\Http\Requests\productAttributesReq;
use App\Http\Resources\productAttributeRes;
use App\Models\productAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function store(productAttributesReq $proAttributesReq)
    {
        $productAttributes=productAttribute::create($proAttributesReq->all());
        return response()->json([
            'message' => 'Product Attributes Successfully Created',
            'data' => new productAttributeRes($productAttributes)
        ],201);
    }

    public function show(productAttribute $productAttribute)
    {
        return response()->json([
            'message' => 'Product Attributes retrieved Successfully',
            'data' => new productAttributeRes($productAttribute)
        ],200);
    }
    public function update(productAttributesReq $proAttributesReq, productAttribute $productAttribute){
        $productAttribute->update($proAttributesReq->validated());
        $productAttribute->refresh();
        return response()->json([
            'message' => 'Product Attributes Successfully Updated',
            'data' => new productAttributeRes($productAttribute)
        ],200);
    }
    public function delete(productAttribute $productAttribute){
        $productAttribute->delete();
        return response()->json([
            'message' => 'Product Attributes Successfully Deleted',
        ],200);
    }
}
