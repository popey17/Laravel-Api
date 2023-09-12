@extends('components.rightPanel')

@section('mainContent')
<div class="mainContent">
    <div class="header">
        <h1 class="me-">products</h1>
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

    <div class="products-wrapper text-center">
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
                    <th>MOQ</th>
                    <th>MOQ Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      
    </div>
  </div>
  </div>
</div>
    <div id="editPopup" class="popup" style="display:none;">

    </div>
    <div class="modal fade" id="delModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="{{ url('products/delete')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    Do you really want to delete this product?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger deleteConfirm">delete</button>
                  </div>             
            </form>
                
          </div>
        </div>
      </div>
@endsection