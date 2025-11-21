<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeProductRequest;
use App\Http\Resources\storeProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function store(storeProductRequest $storeProductRequest)
    {
        $Product =Product::create($storeProductRequest->all());
        return response()->json(
            [
                "Message" => "Product Create",
                "data" => new  storeProductResource($Product)
            ],200
        );
    }

    public function show(Product $Product)
    {
        return response()->json([
           "message" => "اطلاعات با موفقیت دریافت شد!",
           "data" => $Product
        ]);
    }

    public function update(Product $Product,Request $request)
    {
        $Product->update(request()->all());
        $Product = Product::find($Product->id);
         return response()->json([
             "message"=>"اطلاعات محصول مورد نظر با موفقیت بروزرسانی شد !",
             "data"=>$Product
         ],200
         );
    }

    public function delete(Product $Product)
    {
        $Product->delete();
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت حذف شد !"
        ],200
        );
    }
}





