<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Categories::get();
        // dd($data);
        return view('components.category.categories',['categories'=>$data]);
    }

    

    public function create()
    {
        $validator = validator(request()->all(),[
            'name' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = new Categories();
        $data->name= request()->name;
        $data->description= request()->description;
        $data->save();

        return redirect('/categories');
    }

    public function del ()
    {
        $data = Categories::find(request()->categoryId);
        $data->delete();

        return redirect('/categories');
    }

    public function edit ($id)
    {
        $data = Categories::find($id);
        $categories = Categories::get();
        // dd(['categories'=>$categories,'data'=>$data]);
        // return view('components.category.categories',['categories'=>$categories,'data'=>$data]);
        return response()->json($data);
    }

    public function update ()
    {
        $validator = validator(request()->all(),[
            'name' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = Categories::find(request()->editCategoryId);
        $data->name= request()->name;
        $data->description= request()->description;
        $data->save();

        return redirect('/categories');
    }

    public function getCateByName($name)
    {
        $Category= Categories::where('name' , 'like' , '%'. $name .'%')->get();

        return $Category;
    }
}
