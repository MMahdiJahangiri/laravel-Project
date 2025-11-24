<?php

namespace App\Http\Controllers;

use App\Http\Requests\productReq;
use App\Http\Requests\productTypeReq;
use App\Http\Resources\productRes;
use App\Http\Resources\productTypeRes;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    // ایجاد نوع محصول
    public function store(productTypeReq $productTypeReq)
    {
        $ProductType = ProductType::create($productTypeReq->all());

        return response()->json([
            "message" => "Product type created successfully!",
            "data" => new productTypeRes($ProductType)
        ], 201); // 201 = Created
    }

    // نمایش یک نوع محصول
    public function show(ProductType $ProductType)
    {
        return response()->json([
            "message" => "Product type retrieved successfully!",
            "data" => new productTypeRes($ProductType)
        ], 200);
    }

    // بروزرسانی نوع محصول
    public function update(ProductType $ProductType, productTypeReq $request)
    {
        $ProductType->update($request->validated());
        $ProductType->refresh(); // داده تازه بعد از آپدیت

        return response()->json([
            "message" => "Product type updated successfully!",
            "data" => new ProductTypeRes($ProductType)
        ], 200);
    }

    // حذف نوع محصول
    public function delete(ProductType $ProductType)
    {
        $ProductType->delete();
        return response()->json([
            "message" => "Product type deleted successfully!"
        ], 200);
    }
}
