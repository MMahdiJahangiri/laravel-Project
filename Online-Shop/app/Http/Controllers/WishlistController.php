<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeWishlistRequest;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //
    public function store(storeWishlistRequest $storeWishlistRequest)
    {
        $Wishlist=Wishlist::create($storeWishlistRequest->all());
        return response()->json(
            [
                "Message" => "Product Create",
                "data" => $Wishlist
            ],200
        );
    }
    public function show(Wishlist $Wishlist)
    {
        return response()->json([
            "message" => "اطلاعات با موفقیت دریافت شد!",
            "data" => $Wishlist
        ]);
    }

    public function update(Wishlist $Wishlist,Request $request)
    {
        $Wishlist->update(request()->all());
        $Wishlist = Wishlist::find($Wishlist->id);
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت بروزرسانی شد !",
            "data"=>$Wishlist
        ],200
        );
    }

    public function delete(Wishlist $Wishlist)
    {
        $Wishlist->delete();
        return response()->json([
            "message"=>"اطلاعات محصول مورد نظر با موفقیت حذف شد !"
        ],200
        );
    }
}
