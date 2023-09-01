@extends('components.rightPanel')

@section('mainContent')
<div class="mainContent">
    <div class="header">
        <h1>categories</h1>
        <div class="right">
            {{-- <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Item" />
            </div> --}}
            <button type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <span class="title">Add Category</span>
                <span class="icon"><i class="fa-solid fa-plus"></i></span>
            </button>
        </div>
    </div>
    <div>
    <div class="d-flex cards container flex-wrap gap-3">
      @foreach ($categories as $category)
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"> {{ $category->name}}</h5>
          <p class="card-text">{{$category->description}}</p>
          <p class="card-text">Total Item: {{ $category->product->count()}}</p>
          <button type="button" class="btn btn-primary btn-danger float-end categoryDel"data-bs-toggle="modal" data-bs-target="#deleteCategoryModal"  data-id="{{$category->id}}">Delete</button>
        </div>
      </div>
      @endforeach
    </div>
      
    </div>

<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('createCategory')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea type="password" class="form-control"  name="description" id="description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/categories/del/') }}" method="POST">
      @csrf
      <div class="modal-body">
        Do you want to delete this Category?
      </div>
      <input type="hidden" name="categoryId" id="categoryId">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
    @endsection