<?php

namespace App\Http\Controllers;

use App\Http\Requests\productReq;
use App\Http\Resources\productRes;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ایجاد محصول
    public function store(productReq $productRequest)
    {
        $Product = Product::create($productRequest->all());
        return response()->json([
            "message" => "Product created successfully!",
            "data" => new productRes($Product)
        ], 201); // 201 = Created
    }

    // نمایش یک محصول
    public function show(Product $Product)
    {
        return response()->json([
            "message" => "Product retrieved successfully!",
            "data" => new productRes($Product)
        ], 200);
    }

    // بروزرسانی محصول
    public function update(Product $Product, productReq $request)
    {
        $Product->update($request->validated());
        $Product->refresh(); // داده تازه بعد از آپدیت

        return response()->json([
            "message" => "Product updated successfully!",
            "data" => new productRes($Product)
        ], 200);
    }

    // حذف محصول
    public function delete(Product $Product)
    {
        $Product->delete();

        return response()->json([
            "message" => "Product deleted successfully!"
        ], 200);
    }
}
