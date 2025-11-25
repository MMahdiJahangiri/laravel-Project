<?php

namespace App\Http\Controllers;

use App\Http\Requests\productPhotoReq;
use App\Http\Resources\productPhotoRes;
use App\Models\Product_photo;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    //
    public function store(productPhotoReq $reqProductPhoto)
    {
        $Product_photo= Product_photo::create($reqProductPhoto->except('image_path'));
        $Photo_url=Storage::putFile('/ProductPhotos',$reqProductPhoto->image_path);
        return response()->json(
            [
                "Message" => "Product photo created successfully!",
                "data" => new productPhotoRes($Product_photo)
            ],200
        );
    }
    public function show(Product_photo $Product_photo)
    {
        return response()->json([
            "message" => "Product photo retrieved successfully!",
            "data" => new productPhotoRes($Product_photo)
        ]);
    }
    public function update(Product_photo $Product_photo,productPhotoReq $productPhotoReq)
    {
        $Product_photo->update($productPhotoReq->validated());
        $Product_photo->refresh();
        return response()->json([
            "message" => "Product photo updated successfully!",
            "data" => new productPhotoRes($Product_photo)
        ],200
        );
    }
    public function delete(Product_photo $Product_photo)
    {
        $Product_photo->delete();
        return response()->json([
            "message"=>"Product photo deleted successfully!"
        ],200
        );
    }
}
