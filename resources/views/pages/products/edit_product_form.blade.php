@extends('layouts.default_layout')

@section('content')

<h2>Edit Product</h2>

<form action="{{ route('update.product',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if (session('message'))
        <span class="text-success">{{ session('message') }}</span>
    @endif
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Product" value="{{ $product->name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Details</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="detail" rows="3">{{ $product->detail }}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"></label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="image"   placeholder="Upload an image">
        <img src="/images/product/{{ $product->image }}" width="100px">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>



@stop
