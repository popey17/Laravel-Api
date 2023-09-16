<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::all();

        return view('components.products',['categories'=> $categories]);
    }

    public function action(Request $request)
    {

        // $categories = Categories::all();
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.name as category_name')
                    ->where(function ($q) use ($query) {
                        $q->where('products.id', 'like', '%' . $query . '%')
                            ->orWhere('products.item_code', 'like', '%' . $query . '%')
                            ->orWhere('categories.name', 'like', '%' . $query . '%')
                            ->orWhere('products.name', 'like', '%' . $query . '%');
                    })
                    ->orderBy('products.id', 'desc')
                    ->get();
            } else {
                $data = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category_name')
                    ->orderBy('id', 'desc')
                    ->get();
            }
             
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                        <td><img src='.$row->image.'></td>
                        <td>'.$row->item_code.'</td>`
                        <td>'.$row->name.'</td>
                        <td>'.$row->category_name.'</td>
                        <td>'.$row->description.'</td>
                        <td>'.$row->price.'</td>
                        <td>'.$row->moq_amount.'</td>
                        <td>'.$row->moq_price.'</td>
                        <td>
                            <button class="action view-details" data-bs-toggle="modal" data-bs-target="#detailModal" data-id='.$row->id.'><i class="fa-solid fa-circle-info"></i></button>
                            <button class="del"  data-toggle="modal" data-target="#exampleModal" data-id='.$row->id.'><i class="fa-solid fa-trash"></i></a>
                            <button class="action edit" data-bs-toggle="modal" data-bs-target="#editProductModal" data-id='.$row->id.'><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
            );
            echo json_encode($data);
        }
        // return view('components.products',['categories'=> $categories]);

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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);
        
        function removeSpecialCharacters($inputString) {
            // Use a regular expression to remove all special characters
            $cleanedString = preg_replace('/[^a-zA-Z0-9\s]/', '', $inputString);
    
            // Remove extra whitespace
            $cleanedString = preg_replace('/\s+/', '', $cleanedString);

            // Trim any leading or trailing whitespace
            $cleanedString = trim($cleanedString);
    
            return $cleanedString;
        }   

        $itemName = $request->input('name');
        $cleanItemName = removeSpecialCharacters($itemName);
        $itemCode = $request->input('itemCode');
        $claenItemCode = removeSpecialCharacters($itemCode);
 



        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $cleanItemName.'-'.$claenItemCode.'.'.$image->getClientOriginalExtension();
            $image->move('uploads',$imageName);
        }

        

        $product = new Products();
        $product->item_code = $request->input('itemCode');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->moq_amount = request()->moqAmount;
        $product->moq_price = request()->moqPrice;
        $product->category_id = $request->input('category');
        $product->image = empty($imageName) ? 'uploads/no-image.jpg' : 'uploads/' . $imageName;
        $product->save();

        return redirect('/products');
    }

    public function detail($id) 
    {
        $productDetail = Products::find($id);

        return view('components.productDetail',['deatilItem'=> $productDetail]);
    }

    public function edit($id) 
    {
        $product = Products::find($id);
        $data = Categories::all();

        return view('components.productEdit',['product'=> $product,'categories'=>$data]);
    }

    public function del(Request $request)
    {
        $data = Products::find($request->input('delete_id'));
        $data->delete();

        return redirect('/products');
    }

    public function update($id)
    {
        $validator = validator(request()->all(),[
            'itemCode' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        
        
        function removeSpecialCharacters($inputString) {
            // Use a regular expression to remove all special characters
            $cleanedString = preg_replace('/[^a-zA-Z0-9\s]/', '', $inputString);
    
            // Remove extra whitespace
            $cleanedString = preg_replace('/\s+/', '', $cleanedString);

            // Trim any leading or trailing whitespace
            $cleanedString = trim($cleanedString);
    
            return $cleanedString;
        }

        $itemName = request()->input('name'); // Replace with the actual field name for item name
        $cleanItemName = removeSpecialCharacters($itemName);
        $itemCode = request()->input('itemCode');
        $claenItemCode = removeSpecialCharacters($itemCode);
       
 



        if(request()->hasFile('image')){
            $image = request()->file('image');
            $imageName = $cleanItemName.'-'.$claenItemCode.'.'.$image->getClientOriginalExtension();
            $image->move('uploads',$imageName);
        }

        $product = Products::find($id);
        $product->item_code = request()->itemCode;
        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;
        $product->moq_amount = request()->moqAmount;
        $product->moq_price = request()->moqPrice;
        $product->category_id = request()->category;
        $product->image = empty($imageName) ? $product->image : 'uploads/' . $imageName;
        $product->save();

        return redirect('/products');
    }
    
    
}
