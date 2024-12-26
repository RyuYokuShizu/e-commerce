@extends('layouts.app')

@section('title', '')

@section('content')
    <form action="{{ route('product.buy',$product->id)}}" method="post">
        @csrf

        <input type="number" name="amount" class="form-control" max='{{ $product->amount }}'>
        <button type="submit" class="btn"> btn</button>
    </form>
@endsection