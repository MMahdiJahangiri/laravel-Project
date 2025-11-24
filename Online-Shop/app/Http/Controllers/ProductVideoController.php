<?php

namespace App\Http\Controllers;

use App\Http\Requests\productVideoReq;
use App\Models\ProductVideo;
use Illuminate\Http\Request;

class ProductVideoController extends Controller
{
    // ایجاد ویدیو محصول
    public function store(productVideoReq $productVideoReq)
    {
        $ProductVideo = ProductVideo::create($productVideoReq->all());

        return response()->json([
            "message" => "Product video created successfully!",
            "data" => $ProductVideo
        ], 201); // 201 = Created
    }

    // نمایش یک ویدیو محصول
    public function show(ProductVideo $ProductVideo)
    {
        return response()->json([
            "message" => "Product video retrieved successfully!",
            "data" => $ProductVideo
        ], 200);
    }

    // بروزرسانی ویدیو محصول
    public function update(ProductVideo $ProductVideo, productVideoReq $productVideoReq)
    {
        $ProductVideo->update($productVideoReq->all());
        $ProductVideo->refresh(); // داده تازه بعد از آپدیت

        return response()->json([
            "message" => "Product video updated successfully!",
            "data" => $ProductVideo
        ], 200);
    }

    // حذف ویدیو محصول
    public function delete(ProductVideo $ProductVideo)
    {
        $ProductVideo->delete();
        return response()->json([
            "message" => "Product video deleted successfully!"

        ], 200);
    }
}
