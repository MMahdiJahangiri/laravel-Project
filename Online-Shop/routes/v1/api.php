<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPhotoController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductVideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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

Route::post('/product_type/store',[\App\Http\Controllers\ProductTypeController::class,'store']);
Route::get('/product_type/{product_types}/show',[\App\Http\Controllers\ProductTypeController::class,'show']);
Route::put('/product_type/{product_types}/update',[\App\Http\Controllers\ProductTypeController::class,'update']);
Route::delete('/product_type/{product_types}/delete',[\App\Http\Controllers\ProductTypeController::class,'delete']);



Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{product}/show', [ProductController::class, 'show']);
Route::put('/product/{product}/update', [ProductController::class, 'update']);
Route::delete('/product/{product}/delete', [ProductController::class, 'delete']);


Route::post('/product_video/store',[\App\Http\Controllers\ProductVideoController::class,'store']);
Route::get('/product_video/{product_videos}/show',[\App\Http\Controllers\ProductVideoController::class,'show']);
Route::put('/product_video/{product_videos}/update',[\App\Http\Controllers\ProductVideoController::class,'update']);
Route::delete('/product_video/{product_videos}/delete',[\App\Http\Controllers\ProductVideoController::class,'delete']);


Route::post('/product_photo/store', [ProductPhotoController::class, 'store']);
Route::get('/product_photo/{product_photo}/show', [ProductPhotoController::class, 'show']);
Route::put('/product_photo/{product_photo}/update', [ProductPhotoController::class, 'update']);
Route::delete('product_photo/{product_photo}/delete', [ProductPhotoController::class, 'delete']);

Route::post('/attribute/store', [AttributeController::class, 'store']);
Route::get('/attribute/{attribute}/show', [AttributeController::class, 'show']);
Route::put('/attribute/{attribute}/update', [AttributeController::class, 'update']);
Route::delete('/attribute/{attribute}/delete', [AttributeController::class, 'delete']);

Route::post('/wishlist/store', [WishlistController::class, 'store']);
Route::get('/wishlist/{Wishlist}/show', [WishlistController::class, 'show']);
Route::put('/wishlist/{Wishlist}/update', [WishlistController::class, 'update']);
Route::delete('/wishlist/{Wishlist}/delete', [WishlistController::class, 'delete']);

Route::post('/blog/store', [App\Http\Controllers\BlogController::class, 'store']);
Route::put('/blog/{blog}/update', [App\Http\Controllers\BlogController::class, 'update']);
Route::delete('/blog/{blog}/delete', [App\Http\Controllers\BlogController::class, 'delete']);
Route::get('/blog/{blog}/show', [App\Http\Controllers\BlogController::class, 'show']);

Route::post('/blog_like/store', [App\Http\Controllers\BlogLikeController::class, 'store']);
Route::delete('/blog_like/{blog_like}/delete', [App\Http\Controllers\BlogLikeController::class, 'delete']);
Route::get('/blog_like/{blog_like}/show', [App\Http\Controllers\BlogLikeController::class, 'show']);
Route::put('/blog_like/{blog_like}/update', [App\Http\Controllers\BlogLikeController::class, 'update']);

Route::post('/user/store', [UserController::class, 'store']);


Route::post('/admin/store', [AdminController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/{user}/show', [UserController::class, 'show']);
});




