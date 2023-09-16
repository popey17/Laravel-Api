<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class ProductApiController extends Controller
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

    public function getAll(Request $request)
    {
        
        $limit = $request->get('limit', 10);
        
        $query = Products::with('category')->paginate($limit);

        return $query;
    }

    public function getProductsByName($name)
    {
        $product= Products::where('name' , 'like' , '%'. $name .'%')->get();

        return $product;
    }

    public function getProductsByCate($category)
    {
        $categoryItem = Products::with('category')
        ->whereHas('category', function ($query) use ($category) {
            $query->where('name', 'like', '%' . $category . '%');
        })
        ->get();
        
        return $categoryItem;
    }
}
