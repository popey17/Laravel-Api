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
Route::get('/products/{id}', [ProductController::class,'detail'])->name('productDeatil');


Route::get('/categories', [CategoryController::class,'index'])->name('categories');
