<?php

namespace App\Http\Controllers;

use App\Http\Requests\attributeReq;
use App\Http\Resources\attributeRes;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function store(attributeReq $request)
    {
        $attribute = Attribute::create($request->all());

        return response()->json([
            "message" => "Attribute created successfully!",
            "data" => new attributeRes($attribute)
        ], 201);
    }

    public function show(Attribute $attribute)
    {
        return response()->json([
            "message" => "Attribute retrieved successfully!",
            "data" => new attributeRes($attribute)
        ], 200);
    }

    public function update(Attribute $attribute, attributeReq $request)
    {
        $attribute->update($request->validated());
        $attribute->refresh();
        return response()->json([
            "message" => "Attribute updated successfully!",
            "data" => new attributeRes($attribute)
        ], 200);
    }

    
    public function delete(Attribute $attribute)
    {
        $attribute->delete();

        return response()->json([
            "message" => "Attribute deleted successfully!"
        ], 200);
    }
}
