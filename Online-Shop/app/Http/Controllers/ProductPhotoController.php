<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPhotoRequestStore;
use App\Models\Product_photo;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    //
    public function store(ProductPhotoRequestStore $reqProductPhoto)
    {
        $Product_photo= Product_photo::create($reqProductPhoto->except('image_path'));
        $Photo_url=Storage::putFile('/ProductPhotos',$reqProductPhoto->image_path);
        return response()->json(
            [
                "Message" => "Product Create",
                "data" => $Product_photo
            ],200
        );
    }
    public function show(Product_photo $Product_photo)
    {
        return response()->json([
            "message" => "اطلاعات با موفقیت دریافت شد!",
            "data" => $Product_photo
        ]);
    }
    public function update(Product_photo $Product_photo,Request $request)
    {
        $Product_photo->update(request()->all());
        $Product_photo = Product_photo::find($Product_photo->id);
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت بروزرسانی شد !",
            "data"=>$Product_photo
        ],200
        );
    }
    public function delete(Product_photo $Product_photo)
    {
        $Product_photo->delete();
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت حذف شد !"
        ],200
        );
    }
}
