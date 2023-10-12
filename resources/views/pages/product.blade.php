@extends('layouts.default_layout')

@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4">

    @foreach ($products as $product)
        <div class="col">
            <div class="card h-100">
            <img src="{{ $product->image }}" style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->detail }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{ ++$i }}</small>
            </div>
            </div>
        </div>
    @endforeach
</div>

{!! $products->onEachSide(6)->links() !!}





@stop
