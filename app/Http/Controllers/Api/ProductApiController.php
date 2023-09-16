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
        $query = Products::with('category');

        $filters = $request->except(['skip', 'limit']);

        $query->where($filters);

        $skip = $request->get('skip', 0);
        $limit = $request->get('limit', 10);

        $query->skip($skip)->take($limit);

        $query->select('*');

        $result = $query->get();

        return $result;
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
