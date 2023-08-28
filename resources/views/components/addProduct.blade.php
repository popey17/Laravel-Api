@extends('components.rightPanel')

@section('mainContent')
<div class="mainContent">
    <div class="header">
        <h1>Add products</h1>
        <a href="{{ route('products') }}">
            <span class="icon"><i class="fa-solid fa-arrow-left"></i></span>
            <span class="title">Back</span>
        </a>
    </div>
    <div class="addProductForm">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="formItems row">
                <label class="col-12 col-sm-3" for="itemCode">Item Code</label>
                <input class="col-12 col-sm-9" type="text" name="itemCode" required>
            </div>
            <div class="formItems row">
                <label class="col-12 col-sm-3" for="name">Item Name</label>
                <input class="col-12 col-sm-9" type="text" name="name" required>
            </div>
            <div class="formItems row ">
                <label class="col-12 col-sm-3" for="description">Product Description</label>
                <textarea class="col-12 col-sm-9" type="text" name="description" required></textarea>
            </div>
            <div class="formItems row">
                <label class="col-12 col-sm-3" for="price">Price</label>
                <input class="col-12 col-sm-9" type="number" name="price" required>
            </div>
            <div class="formItems row">
                <label class="col-12 col-sm-3" for="category">Category</label>
                <select class="col-12 col-sm-9" name="category" id="category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category["id"] }}">
                            {{ $category["name"] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="formItems row">
                <label class="col-12 col-sm-3" for="image">Add Image</label>
                <input class="col-12 col-sm-9" type="file" name="image">
            </div>
            <input type="submit" value="Add Product"
            class="btn btn-primary addProductBtn">
        </form>
    </div>
</div>
@endsection