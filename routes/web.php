<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class,'index'])->name('admin');

Route::get('/products/add', [ProductController::class,'add'])->name('addProduct');
Route::post('/products/add', [ProductController::class,'create']);

Route::get('/products', [ProductController::class,'index'])->name('products');
Route::get('/action', [ProductController::class,'action'])->name('action');

// Route::get('/products/delete/{id}',[ProductController::class,'del']);
Route::post('/products/delete',[ProductController::class,'del']);

Route::get('/products/edit/{id}',[ProductController::class,'edit']);
Route::post('/products/edit/{id}',[ProductController::class,'update']);



Route::get('/products/{id}', [ProductController::class,'detail'])->name('productDeatil');


Route::get('/categories', [CategoryController::class,'index'])->name('categories');
Route::post('/categories/add', [CategoryController::class,'create'])->name('createCategory');
Route::post('/categories/del', [CategoryController::class,'del']);