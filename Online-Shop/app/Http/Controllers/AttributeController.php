<?php

namespace App\Http\Controllers;

use App\Models\attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    //
    public function store(Request $request)
    {
        $attribute =attribute::create($request->all());
        return response()->json(
            [
                "Message" => "Product Create",
                "data" => $attribute
            ],200
        );
    }

    public function show(attribute $attribute)
    {
        return response()->json([
            "message" => "اطلاعات با موفقیت دریافت شد!",
            "data" => $attribute
        ]);
    }

    public function update(attribute $attribute,Request $request)
    {
        $attribute->update(request()->all());
        $attribute = attribute::find($attribute->id);
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت بروزرسانی شد !",
            "data"=>$attribute
        ],200
        );
    }

    public function delete(attribute $attribute)
    {
        $attribute->delete();
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت حذف شد !"
        ],200
        );
    }
}
