<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVideo;
use Illuminate\Http\Request;

class ProductVideoController extends Controller
{
    //
    public function store(Request $request)
    {
        $ProductVideo= ProductVideo::create($request->all());
        return response()->json(
            [
                "Message" => "Product Create",
                "data" => $ProductVideo
            ],200
        );
    }
    public function show(ProductVideo $ProductVideo)
    {
        return response()->json([
            "message" => "اطلاعات با موفقیت دریافت شد!",
            "data" => $ProductVideo
        ]);
    }

    public function update(ProductVideo $ProductVideo,Request $request)
    {
        $ProductVideo->update(request()->all());
        $ProductVideo = ProductVideo::find($ProductVideo->id);
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت بروزرسانی شد !",
            "data"=>$ProductVideo
        ],200
        );
    }

    public function delete(ProductVideo $ProductVideo)
    {
        $ProductVideo->delete();
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت حذف شد !"
        ],200
        );
    }
}
