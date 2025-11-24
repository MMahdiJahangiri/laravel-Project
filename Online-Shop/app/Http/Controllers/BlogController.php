<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogReq;
use App\Http\Resources\blogRes;
use App\Models\blog;

class BlogController extends Controller
{
    //
    public function store(blogReq $request)
    {
        $blog = blog::create($request->all());
        return response()->json([
            "message" => "blog added successfully",
            "success" => true,
            "data" => new blogRes($blog)
        ], 201);

    }

    public function update(blogReq $request, blog $blog)
    {
        $blog->update($request->all());
        $blog->refresh();
        return response()->json([
            "message" => "blog updated successfully",
            "success" => true,
            "data" => new blogRes($blog)
        ], 200);
    }

    public function delete(blog $blog)
    {
        $blog->delete();
        return response()->json([
            "message" => "blog deleted successfully"

        ], 200);
    }

    public function show(blog $blog)
    {
        return response()->json([
            "message" => "blog show successfully",
            "data" => new blogRes($blog)
        ], 200);
    }
}
