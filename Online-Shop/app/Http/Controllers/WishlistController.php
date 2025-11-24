<?php

namespace App\Http\Controllers;

use App\Http\Requests\wishlistReq;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // ایجاد Wishlist
    public function store(wishlistReq $wishlistReq)
    {
        $Wishlist = Wishlist::create($wishlistReq->all());

        return response()->json([
            "message" => "Wishlist created successfully!",
            "data" => $Wishlist
        ], 201); // 201 = Created
    }

    // نمایش یک Wishlist
    public function show(Wishlist $Wishlist)
    {
        return response()->json([
            "message" => "Wishlist retrieved successfully!",
            "data" => $Wishlist
        ], 200);
    }

    // بروزرسانی Wishlist
    public function update(Wishlist $Wishlist, wishlistReq $wishlistReq)
    {
        $Wishlist->update($wishlistReq->all());
        $Wishlist->refresh(); // داده تازه بعد از آپدیت

        return response()->json([
            "message" => "Wishlist updated successfully!",
            "data" => $Wishlist
        ], 200);
    }

    // حذف Wishlist
    public function delete(Wishlist $Wishlist)
    {
        $Wishlist->delete();

        return response()->json([
            "message" => "Wishlist deleted successfully!"
        ], 200);
    }
}
