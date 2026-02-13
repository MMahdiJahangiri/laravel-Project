<?php

namespace App\Http\Controllers;

use App\Http\Requests\productVideoReq;
use App\Http\Resources\productVideoRes;
use App\Models\ProductVideo;

class ProductVideoController extends Controller
{
    public function store(productVideoReq $productVideoReq)
    {
        $ProductVideo = ProductVideo::create($productVideoReq->all());

        return response()->json([
            "message" => "Product video created successfully!",
            "data" => new productVideoRes($ProductVideo)
        ], 201); // 201 = Created
    }

    public function show(ProductVideo $ProductVideo)
    {
        return response()->json([
            "message" => "Product video retrieved successfully!",
            "data" => new productVideoRes($ProductVideo)
        ], 200);
    }

    public function update(ProductVideo $ProductVideo, productVideoReq $productVideoReq)
    {
        $ProductVideo->update($productVideoReq->all());
        $ProductVideo->refresh(); // داده تازه بعد از آپدیت

        return response()->json([
            "message" => "Product video updated successfully!",
            "data" => new productVideoRes($ProductVideo)
        ], 200);
    }

    public function delete(ProductVideo $ProductVideo)
    {
        $ProductVideo->delete();
        return response()->json([
            "message" => "Product video deleted successfully!"

        ], 200);
    }
}
