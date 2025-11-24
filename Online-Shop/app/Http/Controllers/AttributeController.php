<?php

namespace App\Http\Controllers;

use App\Http\Requests\attributeReq;
use App\Http\Resources\attributeRes;
use App\Http\Resources\userRes;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    // ایجاد Attribute
    public function store(attributeReq $request)
    {
        $attribute = Attribute::create($request->all());

        return response()->json([
            "message" => "Attribute created successfully!",
            "data" => new attributeRes($attribute)
        ], 201);
    }

    // نمایش یک Attribute
    public function show(Attribute $attribute)
    {
        return response()->json([
            "message" => "Attribute retrieved successfully!",
            "data" => new attributeRes($attribute)
        ], 200);
    }

    // بروزرسانی Attribute
    public function update(Attribute $attribute, attributeReq $request)
    {
        $attribute->update($request->validated());
        $attribute->refresh();
        return response()->json([
            "message" => "Attribute updated successfully!",
            "data" => new attributeRes($attribute)
        ], 200);
    }

    // حذف Attribute
    public function delete(Attribute $attribute)
    {
        $attribute->delete();

        return response()->json([
            "message" => "Attribute deleted successfully!"
        ], 200);
    }
}
