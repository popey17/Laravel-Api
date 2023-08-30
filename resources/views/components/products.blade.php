@extends('components.rightPanel')

@section('mainContent')
<div class="mainContent">
    <div class="header">
        <h1>products</h1>
        <div class="right">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Item" />
            </div>
            <a href="{{ route('addProduct') }}">
                <span class="title">Add Product</span>
                <span class="icon"><i class="fa-solid fa-plus"></i></span>
            </a>
        </div>
    </div>

    <div class="products-wrapper">
        <table>
            <colgroup>
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 15%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 30%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 15%;">
             </colgroup>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Item Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div id="detailPopup" class="popup">

    </div>
    <div id="editPopup" class="popup">

    </div>
@endsection