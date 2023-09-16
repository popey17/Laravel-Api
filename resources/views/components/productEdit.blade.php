<div class="editForm">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="/products/edit/{{$product['id']}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="itemCode">Item Code</label>
            <input class="form-control" type="text" name="itemCode" value="{{ $product['item_code'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="name">Item Name</label>
            <input class="form-control" type="text" name="name" value="{{ $product['name']}}" required>
        </div>
        <div class="mb-3 ">
            <label class="form-label" for="description">Product Description</label>
            <textarea class="form-control" type="text" name="description" required>{{ $product['description'] }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control" type="number" name="price" value="{{ $product['price'] }}" required>
        </div>
        <div class="mb-3 row">
            <div class="col-6">
              <label class="form-label" for="moqAmount">MOQ</label>
              <input class="form-control" type="number" name="moqAmount" id="moqAmount" value="{{ $product['moq_amount']}}">
            </div>
            <div class="col-6">
              <label class="form-label" for="moqPrice">MOQ Price</label>
              <input class="form-control" type="number" name="moqPrice" id="moqPrice" value="{{ $product['moq_price']}}">
            </div>
          </div>
        <div class="mb-3">
            <label class="form-label" for="category">Category</label>
            <select class="form-control" name="category" id="category" required>
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
        <div class="mb-3">
            <label class="form-label" for="image">Add Image</label>
            <input class="form-control" type="file" value="{{$product->image}}" name="image">
        </div>
        <div>
            <input type="submit" value="Edit Product"
            class="btn btn-primary addProductBtn">
        </div>
    </form>
    </div>
</div>
