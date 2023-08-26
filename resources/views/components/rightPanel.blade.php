@extends('layouts.app')

@section('content')
<section class="main-container row">
  <div class="left-nav-container col-2">
      <ul>
        <li>Admin Panel</li>
        <li>Products</li>
        <li>Categories</li>
      </ul>
  </div>
  <div class="col-10 main-content">
    @yield('mainContent')
  </div>
</section>
@endsection