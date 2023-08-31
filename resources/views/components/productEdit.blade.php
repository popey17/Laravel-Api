<div class="addProductForm" id="editForm" >
    <form action="/products/edit/{{$product['id']}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="formItems row">
            <label class="col-12 col-sm-3" for="itemCode">Item Code</label>
            <input class="col-12 col-sm-9" type="text" name="itemCode" value="{{ $product['item_code'] }}">
        </div>
        <div class="formItems row">
            <label class="col-12 col-sm-3" for="name">Item Name</label>
            <input class="col-12 col-sm-9" type="text" name="name" value="{{ $product['name']}}" required>
        </div>
        <div class="formItems row ">
            <label class="col-12 col-sm-3" for="description">Product Description</label>
            <textarea class="col-12 col-sm-9" type="text" name="description" required>{{ $product['description'] }}</textarea>
        </div>
        <div class="formItems row">
            <label class="col-12 col-sm-3" for="price">Price</label>
            <input class="col-12 col-sm-9" type="number" name="price" value="{{ $product['price'] }}" required>
        </div>
        <div class="formItems row">
            <label class="col-12 col-sm-3" for="category">Category</label>
            <select class="col-12 col-sm-9" name="category" id="category" required>
                @foreach ($categories as $category)
                    <option value="{{ $category["id"] }}"
                        @if ($category->id === $product['category_id'])
                            selected
                        @endif>
                        {{ $category["name"] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="formItems row">
            <label class="col-12 col-sm-3" for="image">Add Image</label>
            <input class="col-12 col-sm-9" type="file" value="{{$product->image}}" name="image">
        </div>
        <div>
            <input type="submit" value="Edit Product"
            class="btn btn-primary addProductBtn">
        </div>
    </form>
    <button class="btn btn-primary addProductBtn cancelBtn">Cancel</button>
</div>