@extends('layouts.app')

@section('title','Home')

@section('content')
  <div class="row">
    <h1 class="h3 py-2 p-0">Coffee Beans</h1>
    {{-- <img src="{{asset('storage/Colorful Cycle Chart Instagram Post.png')}}" alt="" style="width:60vh"> --}}

    <div class="row justify-content-between">
        @foreach($all_products as $product)
        <div class="card col-2 rounded-0 p-0 mb-2 border-0">
            <a href="{{ route('product.purchase', $product->id)}}">
            <img src="{{asset('storage/public/image/'. $product->image)}}" class="card-img-top rounded-0" style="width:10rem; height:13rem; object-fit:cover;" alt="{{$product->name}}">
            </a>
            <div class="card-body py-2 px-1">
                <p class="h6 p-0 m-0">{{$product->name}}</p>
                <p class="text-secondary small py-1 m-0">${{$product->fee}}</p>

                <a href="{{ route('product.purchase', $product->id) }}" class="btn btn-outline-secondary w-100 btn-sm ">SELECT OPTIONS</a> 
            </div>
        </div>
        @endforeach
    </div>
 </div>
@endsection
