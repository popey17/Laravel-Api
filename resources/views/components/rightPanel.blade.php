@extends('layouts.app')

@section('content')
<section class="main-container row">
  <div class="left-nav-container col-2 col-md-3 col-xxl-2">
      <ul>
        <li class="side-nav-items">
          <b></b>
          <b></b>
          <a href="{{ route('admin') }}">
            <span class="icon"><i class="fa-solid fa-gear"></i></span>
            <span class="title">Admin Panel</span>
          </a>
        </li>
        <li class="side-nav-items">
          <b></b>
          <b></b>
          <a href="{{ route('products') }}">
            <span class="icon"><i class="fa-solid fa-boxes-stacked"></i></span>
            <span class="title">Products</span>
          </a>
        </li>
        <li class="side-nav-items">
          <b></b>
          <b></b>
          <a href="{{ route('categories') }}">
            <span class="icon"><i class="fa-solid fa-clipboard"></i></span>
            <span class="title">Categories</span>
          </a>
        </li>
      </ul>
  </div>
  <div class="col-10 col-md-9 col-xxl-10 main-content">
    @yield('mainContent')
  </div>
</section>
@endsection