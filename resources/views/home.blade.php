@extends('layouts.app')

@section('title','Home')

@section('content')
 <div class="row">
    <h1 class="h3 py-2 p-0">Coffee Beans</h1>
    <img src="{{asset('storage/Colorful Cycle Chart Instagram Post.png')}}" alt="" style="width:60vh">

    <div class="row justify-content-between ">
        <div class="card col-2 rounded-0 p-0 mb-2 border-0">
            <img src="https://oc-shop.co.jp/cdn/shop/files/santuario-specialty.jpg?v=1731564581&width=360" class="card-img-top rounded-0" width="100%" alt="product">
            <div class="card-body py-2 px-1">
                <p class="h6 p-0 m-0">No.1 BRAZIL Geisha Natural Aerobic</p>
                <p class="text-secondary small py-1 m-0">$6000</p>

                <a href="#" class="btn btn-outline-secondary w-100 btn-sm ">SELECT OPTIONS</a>
            </div>
        </div>
    </div>
 </div>
@endsection
