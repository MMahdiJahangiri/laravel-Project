<?php

use App\Models\product_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/product_type/store',[App\Http\Controllers\ProductTypeController::class,'store']);
Route::get('/product_type/{product_types}/show',[App\Http\Controllers\ProductTypeController::class,'show']);
Route::put('/product_type/{product_types}/update',[App\Http\Controllers\ProductTypeController::class,'update']);
Route::delete('/product_type/{product_types}/delete',[\App\Http\Controllers\ProductTypeController::class,'delete']);



Route::post('/product/store',[\App\Http\Controllers\ProductController::class,'store']);
Route::get('/product/{product}/show',[\App\Http\Controllers\ProductController::class,'show']);
Route::put('/product/{product}/update',[\App\Http\Controllers\ProductController::class,'update']);
Route::delete('/product/{product}/delete',[\App\Http\Controllers\ProductController::class,'delete']);


Route::post('/product_video/store',[\App\Http\Controllers\ProductVideoController::class,'store']);
Route::get('/product_video/{product_videos}/show',[\App\Http\Controllers\ProductVideoController::class,'show']);
Route::put('/product_video/{product_videos}/update',[\App\Http\Controllers\ProductVideoController::class,'update']);
Route::delete('/product_video/{product_videos}/delete',[\App\Http\Controllers\ProductVideoController::class,'delete']);


 Route::post('/product_photo/store',[\App\Http\Controllers\ProductPhotoController::class,'store']);
 Route::get('/product_photo/{product_photo}/show',[\App\Http\Controllers\ProductPhotoController::class,'show']);
 Route::put('/product_photo/{product_photo}/update',[\App\Http\Controllers\ProductPhotoController::class,'update']);
 Route::delete('product_photo/{product_photo}/delete',[\App\Http\Controllers\ProductPhotoController::class,'delete']);

 Route::post('/attribute/store',[\App\Http\Controllers\AttributeController::class,'store']);
Route::get('/attribute/{attribute}/show',[\App\Http\Controllers\AttributeController::class,'show']);
Route::put('/attribute/{attribute}/update',[\App\Http\Controllers\AttributeController::class,'update']);
Route::delete('/attribute/{attribute}/delete',[\App\Http\Controllers\AttributeController::class,'delete']);

Route::post('/wishlist/store',[\App\Http\Controllers\WishlistController::class,'store']);
Route::get('/wishlist/{Wishlist}/show',[\App\Http\Controllers\WishlistController::class,'show']);
Route::put('/wishlist/{Wishlist}/update',[\App\Http\Controllers\WishlistController::class,'update']);
Route::delete('/wishlist/{Wishlist}/delete',[\App\Http\Controllers\WishlistController::class,'delete']);

Route::post('/user/store',[\App\Http\Controllers\UserController::class,'store']);


Route::post('/admin/store',[\App\Http\Controllers\AdminController::class,'store']);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/user/{user}/show',[\App\Http\Controllers\UserController::class,'show']);
});




