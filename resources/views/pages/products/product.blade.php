@extends('layouts.default_layout')
@section('content')

<div class="card text-center">
    <div class="card-header">
      @if(session('message'))
      <span class="text-success">{{ session('message') }}</span>
      @endif
    </div>
    <div class="card-body">
      <h5 class="card-title">Special Products Available</h5>
      <a href=" {{ route('product.form') }}" class="btn btn-primary">Add Products</a>
    </div>
</div>

@if($products->count() > 0)
    <div class="row row-cols-1 row-cols-md-3 g-4">
@endif

    @forelse ($products as $product)

        <div class="col">
            <div class="card h-100">
            <img src="images/product/{{ $product['image'] }}"  style="height: 150px" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product['name'] }}</h5>
                <p class="card-text">{{ $product['detail'] }}</p>
            </div>
            <div class="card-footer">

                <form action=" {{ route('delete.product',$product['id']) }}" method="POST">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <a href=" {{ route('show_edit.product',$product['id']) }}" class="btn btn-primary btn-sm">
                            <svg class="bi bi-pen" width="32" height="32" fill="currentColor"  >
                                <use xlink:href="assets/icons/bootstrap-icons.svg#pen"/>
                            </svg>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm show_confirm"  id="deletebtn" type="submit">
                            <svg class="bi bi-trash" width="32" height="32" fill="currentColor">
                                <use xlink:href="assets/icons/bootstrap-icons.svg#trash"/>
                            </svg>
                        </button>
                    <small class="text-muted"></small>
                </div>
                </form>
            </div>
            </div>
        </div>

        @empty


    @endforelse
</div>

{!! $products->onEachSide(6)->links() !!}
<script type="text/javascript">


        $(".show_confirm").on("click", function (e) {
            e.preventDefault();
            var form =  $(this).closest("form");

            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });

</script>

@stop

