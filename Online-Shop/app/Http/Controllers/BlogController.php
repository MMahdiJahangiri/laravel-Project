<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogReq;
use App\Models\blog;

class BlogController extends Controller
{
    //
    public function store(blogReq $request)
    {
        blog::create($request->all());

    }
}
