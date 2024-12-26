@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($all_products as $product)
                <a href="{{ route('product.edit', $product->id)}}">{{ $product->name}}</a>
                <a href="{{ route('product.purchase',$product->id)}}">purchase</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
