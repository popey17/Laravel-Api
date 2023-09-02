<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class,'getAll'])->middleware('auth:sanctum');
Route::get('/categories/{id}', [CategoryController::class,'getProductsByCate'])->middleware('auth:sanctum');
Route::get('/products/{name}', [ProductController::class,'getProductsByName'])->middleware('auth:sanctum');
Route::get('/categories', [CategoryController::class,'getAll'])->middleware('auth:sanctum');

Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);
