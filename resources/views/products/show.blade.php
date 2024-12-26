@extends('layouts.app')

@section('title', 'product detail')

@section('content')
    <div class="container w-75">
      <div class="pb-4">
        <nav class="navbar">
          <div class="container m-0">
            <nav class="navbar navbar-expand-md navbar-light">
              <div class="container">

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- nav Home CoffeeBeans Kredo Coffee --}}
                      <ul class="navbar-nav ms-auto">
                              <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                              </li>
                              <li class="d-flex align-items-center px-3">></li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Coffee Beans</a>
                              </li>
                              <li class="d-flex align-items-center px-3">></li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Kredo Coffee</a>
                              </li>
                      </ul>
                  </div>
              </div>
          </nav>
        </nav>
        <div class="row">
          <div class="col-6">
            <img src="{{asset('storage/public/image/'. $product->image)}}" class="card-img-top rounded-0" style="width:20rem; height:10rem; object-fit:cover;" alt="{{$product->name}}">
          </div>
          <div class="col-6">
            <p class="text-secondary">Kredo Coffee</p>
            <p class="fs-3 mb-4">{{ $product->name }}</p>
            <p class="fs-3 mb-4">{{ $product->fee }} $</p>
            <form action="#" method="post">
              @csrf
              <div class="form-group d-flex align-items-center">
                <label for="input-label">Quantity</label>
                <input type="number" name="quantity" class="form-control w-50 ms-2" id="input-label">
              </div>
              <button type="submit" class="btn btn-primary my-4 w-75 p-2">Add to Cart! Hurry!</button>
            </form>
            <div class=""><a href="#" class="text-decoration-none text-danger"><i class="fa-regular fa-heart"></i></a></div>
          </div>
        </div>
        {{-- Introduction of the products. --}}
        <div class="my-4">
          <h2>Introduction</h2>
          <div class="bg-light">
          <h3>Features</h3>
          <p class="fs-4" style="word-wrap: break-word; word-break: break-all;">
            {{ $product->description }}
          </p>
          </div>
        </div>
      </div>
    </div>
@endsection