@extends('components.rightPanel')

@section('mainContent')
<div class="mainContent">
    <div class="header">
        <h1>products</h1>
        <a href="{{ route('addProduct') }}">
            <span class="title">Add Product</span>
            <span class="icon"><i class="fa-solid fa-plus"></i></span>
        </a>
    </div>
    <div class="products">
        <div class="itemTitle row">
            <div class="col-10">
                <div class="row">
                    <div class="col-3">Item Code</div>
                    <div class="col-3">Item Name</div>
                    <div class="col-3">Category</div>
                    <div class="col-3">Price</div>
                </div>
            </div>
            <div class="col-2">
                properties
            </div>
        </div>
        @foreach ($products as $product)
            <div class="item row">
                <div class="col-10">
                    <div class="view-details" data-id='{{ $product['id'] }}'>
                        <div class="row">
                            <div class="col-3">{{ $product['item_code'] }}</div>
                            <div class="col-3">{{ $product['name'] }}</div>
                            <div class="col-3">{{ $product['Category']['name'] }}</div>
                            <div class="col-3">{{ $product['price'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    right
                </div>
            </div>
        @endforeach
        
    </div>
    <div id="detailPopup" class="popup">

    </div>
</div>
@endsection