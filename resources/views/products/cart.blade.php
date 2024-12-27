@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="row">
        <h2 class="text-center">Checkout</h2>
        <hr style="width:4rem" class="text-secondary">
        {{-- Product review --}}
        <div class="col-9">
            <h3 class="fw-bold">Products</h3>
            @foreach ($carts as $cart)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-6">
                        {{-- <img src="{{asset('storage/public/image/'. $product->image)}}" alt="{{$product->name}}" class="img-fulid"> --}}
                        <img src="{{asset('storage/Colorful Cycle Chart Instagram Post.png')}}" alt="" class="img-fulid" style="width: 10rem; height:20rem;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cart->product->name }}</h5>
                            <p class="card-text">{{ $cart->product->fee }}</p>
                            <p class="card-text">{{ $cart->quantity }}</p>
                            <form action="3" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn border-0 btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                
            @endforeach

        </div>
        {{-- Total price --}}
        <div class="col-4">
            <h3 class="fw-bold">Total Due</h3>
            <p>$300</p>
        </div>
    </div>
@endsection