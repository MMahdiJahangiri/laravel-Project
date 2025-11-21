<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //
    public function store(Request $request)
    {
        $ProductType =ProductType::create($request->all());
        return response()->json(
            [
                "Message" => "Product Create",
                "data" => $ProductType
            ],200
        );
    }
    public function show(ProductType $ProductType)
    {
        return response()->json([
            "message" => "اطلاعات با موفقیت دریافت شد!",
            "data" => $ProductType
        ]);
    }

    public function update(ProductType $ProductType,Request $request)
    {
        $ProductType->update(request()->all());
        $ProductType = ProductType::find($ProductType->id);
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت بروزرسانی شد !",
            "data"=>$ProductType
        ],200
        );
    }

    public function delete(ProductType $ProductType)
    {
        $ProductType->delete();
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت حذف شد !"
        ],200
        );
    }
}
