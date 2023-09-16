<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function getAll()
    {
       return Categories::with('product')->get();
    }

    public function getCate($id)
    {
        // return Categories::with('product')->find($id);
        $category = Categories::with('product')->find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    return response()->json($category);
    }
 
}
