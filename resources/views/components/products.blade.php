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
    {{-- <div class="products">
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
        </div> --}}
    <div class="products-wrapper">
        @foreach ($products as $product)
        <div class="item view-details" data-id='{{ $product['id'] }}'>
            <div class="left">
                <img src="{{ $product['image'] }}" alt="">
            </div>
            <div class="mid">
                <div class="top">
                    <div class="code">
                        <span>Item Code</span>
                        <p>{{ $product['item_code']}}</p>
                    </div>
                    <div class="name">
                        <span>Name</span>
                        <p>{{ $product['name']}}</p>
                    </div>
                    <div class="price">
                        <span>Price</span>
                        <p>{{ $product['price']}}</p>
                    </div>    
                </div>
                <div class="bot">
                    <div class="description">
                        <span>Item Description</span>
                        <p>{{ $product['description']}}</p>
                    </div>
                </div>
            </div>
            <div class="right">
                right
            </div>
        </div>
        {{-- <div class="item row">
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
        </div> --}}
    @endforeach
    </div>
    
        
    </div>
    <div id="detailPopup" class="popup">

    </div>
</div>
@endsection