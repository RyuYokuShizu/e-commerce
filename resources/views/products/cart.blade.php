@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        .cart {
            font-family: "Montserrat", serif;
        }
    </style>
    <div class="row cart">
        <div class="row justify-content-center">
            <h2 class="h3 text-center my-2">Checkout</h2>
            <hr style="width:10rem" class="text-secondary mb-3 mt-2">
        </div>
        {{-- Product review --}}
        <div class="col-8">
            <h3 class="h5 mb-3">Products</h3>
            @forelse ($carts as $cart)
                <div class="card mb-5 border-0">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{asset('storage/public/image/'. $cart->product->image)}}" alt="{{$cart->product->name}}" class="img-fulid" style="width:15rem">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body ps-0 pt-0">
                                <h5 class="card-title">{{ $cart->product->name }}</h5>
                                <p class="card-text">${{ $cart->product->fee }}</p>
                                <p class="card-text mb-0">Quantity: {{ $cart->quantity }}</p>
                                <form action="3" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ms-0 ps-0 btn border-0 text-secondary btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>     
            @empty
                <div class="text-secondary">
                    No product in your cart yet
                </div>
            @endforelse
        </div>
        {{-- Total price --}}
        <div class="col-3">
            <h3 class="h5 mb-3">Total Due</h3>
            <p class="mb-0 pb-0 fw-bold large">${{$final_total_price}}</p>
            <p class="text-secondary small">Shipping fee is always free.</p>
            <form action="" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary w-50 rounded-0">Purchase</button>
            </form>
        </div>
    </div>
@endsection