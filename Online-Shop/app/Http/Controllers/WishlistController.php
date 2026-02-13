<?php

namespace App\Http\Controllers;

use App\Http\Requests\wishlistReq;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function store(wishlistReq $wishlistReq)
    {
        $Wishlist = Wishlist::create($wishlistReq->all());

        return response()->json([
            "message" => "Wishlist created successfully!",
            "data" => $Wishlist
        ], 201);
    }

    public function show(Wishlist $Wishlist)
    {
        return response()->json([
            "message" => "Wishlist retrieved successfully!",
            "data" => $Wishlist
        ], 200);
    }

    public function update(Wishlist $Wishlist, wishlistReq $wishlistReq)
    {
        $Wishlist->update($wishlistReq->all());
        $Wishlist->refresh();

        return response()->json([
            "message" => "Wishlist updated successfully!",
            "data" => $Wishlist
        ], 200);
    }

    public function delete(Wishlist $Wishlist)
    {
        $Wishlist->delete();

        return response()->json([
            "message" => "Wishlist deleted successfully!"
        ], 200);
    }
}
