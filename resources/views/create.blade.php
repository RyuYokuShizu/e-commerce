@extends('layouts.app')

@section('title', 'Create')

@section('content')

<div class="justify-center-content">

    <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="category" class="form-label d-block fw-bold">
                Category <span class="text-muted fw-normal">(up to )</span>
            </label>
            
            @foreach ($all_categories as $category)
            <div class="form-check form-check-inline">
                <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}">
                <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
            </div>
            @endforeach
            {{-- Error --}}
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" id="name" class="form-control">
            {{-- Error --}}
            @error('name')
            <div class="text-danger">{{ $message }}</div>              
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="What">{{ old('description') }}</textarea>
            {{-- Error --}}
            @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        
        <div class="mb-4">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
            <div id="image-info" class="form-text">
                The acceptable formats are jpeg, jpg, png, and gif only. <br>
                Max file size is 1048KB
            </div>
            {{-- Error --}}
            @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    
        </div>

        <div>
            <label for="stock" class="form-label">stock</label>
            <input type="number" name="stock" id="stock" class="form-control">
        </div>
        <div>
            <label for="fee" class="form-label">stock</label>
            <input type="number" name="fee" id="fee" class="form-control">
        </div>
        

            <button type="submit" class="btn btn-primary px-5">product</button>
       
    </form>

    @foreach ($all_products as $post)
    <div>{{ $post->name }}</div>
    <img src="{{ asset('storage/public/image/'.$post->image) }}" alt="{{ $post->image }}">
    <div>{{ $post->id }}</div>
    <div>{{ $post->description }}</div>
    @endforeach



   <label for="quantity">数量:</label>
<div class="quantity-container">
    <button type="button" class="quantity-btn" id="decrease">-</button>
    <input type="number" id="quantity" name="quantity" value="1" min="1" step="1" class="number-input">
    <button type="button" class="quantity-btn" id="increase">+</button>
</div>
    



@endsection