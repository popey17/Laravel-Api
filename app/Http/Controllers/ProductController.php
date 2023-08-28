<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Products::all();
        // dd($data);
        return view('components.products', ['products'=> $data]);
    }

    public function getAll()
    {
       return Products::with('category')->get();
    }

    public function add()
    {
        $data = Categories::all();
        return view('components.addProduct',['categories'=>$data]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'itemCode' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        $lastProductId = Products::orderBy('id','desc')->first();
        $nextProductId = $lastProductId ? $lastProductId->id + 1 : 1 ;
        // dd($nextProductId);


        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $nextProductId.'.'.$image->getClientOriginalExtension();
            $image->move('uploads',$imageName);
        }

        

        $product = new Products();
        $product->item_code = $request->input('itemCode');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->image = asset('uploads/'.$imageName);
        $product->save();

        return redirect('/products');
    }

    public function detail($id) 
    {
        $productDetail = Products::find($id);

        return view('components.ProductDetail',['deatilItem'=> $productDetail]);
    }
    
}
