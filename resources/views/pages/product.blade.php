@extends('layouts.default_layout')

@section('content')

@if($products->count() > 0)
    <div class="row row-cols-1 row-cols-md-3 g-4">
@endif

    @forelse ($products as $product)

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

        @empty
        <div class="card text-center">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
              <h5 class="card-title">Special Products Available</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Add Products</a>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>

    @endforelse
</div>

{!! $products->onEachSide(6)->links() !!}





@stop
