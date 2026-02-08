<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogTagReq;
use App\Http\Resources\blogTagRes;
use App\Models\blogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    public function store(blogTagReq $req)
    {
        $blogTag=blogTag::create($req->all());
        return response()->json([
            'message'=> 'success!',
            'data'=> new blogTagRes($blogTag)
        ],201);
    }

    public function update(blogTagReq $req, blogTag $blogTag)
    {
       $blogTag->update($req->validated());
       $blogTag->refresh();
       return response()->json([
           'message'=> 'success!',
           'data'=> new blogTagRes($blogTag)
       ],200);
    }
    public function delete(blogTag $blogTag)
    {
        $blogTag->delete();
        return response()->json([
            'message'=> 'success!',
        ],200);
    }

    public function show(blogTag $blogTag)
    {
        return response()->json([
            'message'=> 'success!',
            'data'=> new blogTagRes($blogTag)
        ],200);
    }
}
