@extends('layouts.default_layout')
@include('css.dashboard_css')
@section('content')

@forelse ($data as $datas )

<div class="frame">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <a href=" {{ route('restaurantMenu',['name' => $datas->name, 'category' => 'null'] ) }}" class="btn btn-primary btn-sm">
                        <svg class="bi bi-pen" width="32" height="32" fill="currentColor"  >
                            <use xlink:href="assets/icons/bootstrap-icons.svg#pen"/>
                        </svg>
                        {{ $datas->name }}
                    </a>
                </div>
            </div>
        </div>
	</div>
</div>

@empty
<p class="text-danger">No data</p>

@endforelse


@stop
