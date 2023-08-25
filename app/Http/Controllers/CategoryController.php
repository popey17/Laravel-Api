<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
       return Categories::with('product')->get();
    }

    public function getProductsByCate($id)
    {
        // return Categories::with('product')->find($id);
        $category = Categories::with('product')->find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    return response()->json($category);
    }
}
