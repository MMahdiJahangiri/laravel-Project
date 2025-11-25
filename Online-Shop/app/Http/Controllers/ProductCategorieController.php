<?php

namespace App\Http\Controllers;

use App\Http\Requests\productCategorieReq;
use App\Http\Resources\productCategorieRes;
use App\Models\product_categorie;
use Illuminate\Http\Request;

class ProductCategorieController extends Controller
{
    public function store(productCategorieReq $categorieReq)
    {
        $categorie = product_categorie::create( $categorieReq->all());
        return response()->json([
            'message' => 'Product Categorie Created Successfully',
            'data' => new productCategorieRes($categorie)
        ],201);
    }

    public function show(product_categorie $product_categorie)
    {
        return response()->json([
            'message' => 'Product Categorie Show Successfully',
            'data' => new productCategorieRes($product_categorie)
        ],200);
    }

    public function update(productCategorieReq $CategorieReq ,product_categorie $product_categorie)
    {
        $product_categorie->update($CategorieReq->validated());
        $product_categorie->refresh();
        return response()->json([
            'message' => 'Product Categorie Updated Successfully',
            'data' => new productCategorieRes($product_categorie)
        ],200);

    }
    public function delete(product_categorie $product_categorie){
        $product_categorie->delete();
        return response()->json([
            'message' => 'Product Categorie Deleted Successfully',
        ],200);

    }
}
