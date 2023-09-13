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
            <div class="mb-3">
                <label class="form-label" for="itemCode">Item Code</label>
                <input class="form-control" type="text" name="itemCode" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Item Name</label>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Product Description</label>
                <textarea class="form-control" type="text" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input class="form-control" type="number" name="price" required>
            </div>
            <div class="mb-3 row">
                <div class="col-6">
                  <label class="form-label" for="moqAmount">MOQ</label>
                  <input class="form-control" type="number" name="moqAmount" id="moqAmount">
                </div>
                <div class="col-6">
                  <label class="form-label" for="moqPrice">MOQ Price</label>
                  <input class="form-control" type="number" name="moqPrice" id="moqPrice">
                </div>
              </div>
            <div class="mb-3">
                <label class="form-label" for="category">Category</label>
                <select class="form-control" name="category" id="category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category["id"] }}">
                            {{ $category["name"] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Add Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div>
                <input type="submit" value="Add Product"
                class="btn btn-primary addProductBtn">
            </div>
        </form>
    </div>
</div>
@endsection