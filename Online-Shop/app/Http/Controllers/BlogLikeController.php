<?php

namespace App\Http\Controllers;

use App\Http\Requests\blog_likeReq;
use App\Http\Resources\blog_likeRes;
use App\Models\blog_like;

class BlogLikeController extends Controller
{
    //
    public function store(blog_likeReq $request)
    {
        blog_like::create($request->all());
        return response()->json([
            "message" => "success",
            "data" => new blog_likeRes($request)
        ], 200);
    }

    public function update(blog_likeReq $req, blog_like $blog_like)
    {
        $blog_like->update($req->all());
        $blog_like->refresh();
        return response()->json([
            "message" => "success",
            "data" => new blog_likeRes($blog_like)
        ], 200);
    }

    public function delete(blog_like $blog_like)
    {
        $blog_like->delete();
        return response()->json([
            "message" => "success",
        ], 200);
    }

    public function show(blog_like $blog_like)
    {
        return response()->json([

            "data" => new blog_likeRes($blog_like)
        ], 200);
    }
}
