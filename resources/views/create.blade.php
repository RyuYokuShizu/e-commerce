@extends('layouts.app')

@section('title', 'Create')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    .create {
        font-family: "Montserrat", serif;
    }
</style>

<div class="row justify-content-center create">
    <div class="col-9">
        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="category" class="form-label d-block fw-bold ">
                    Category <span class="text-muted fw-normal">(up to 3)</span>
                </label>
                
                @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input rounded-0" value="{{ $category->id }}">
                    <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                </div>
                @endforeach
                {{-- Error --}}
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                
            </div>
    
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Product Name</label>
                <input type="text" name="name" id="name" class="form-control rounded-0" value="{{old('name')}}">
                {{-- Error --}}
                @error('name')
                <div class="text-danger">{{ $message }}</div>              
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control rounded-0" placeholder="What">{{ old('description') }}</textarea>
                {{-- Error --}}
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" name="image" id="image" class="form-control rounded-0" aria-describedby="image-info">
                <div id="image-info" class="form-text">
                    The acceptable formats are jpeg, jpg, png, and gif only. <br>
                    Max file size is 1048KB
                </div>
                {{-- Error --}}
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="stock" class="form-label fw-bold">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control rounded-0">
            </div>

            <div class="mb-3">
                <label for="fee" class="form-label fw-bold">Price</label>
                <input type="number" name="fee" id="fee" class="form-control rounded-0">
            </div>
            
            <div class="row my-4 justify-content-center">
                <button type="submit" class="btn btn-secondary px-5 w-50 rounded-0">Register Product</button>
            </div>
        </form>
    </div>
@endsection