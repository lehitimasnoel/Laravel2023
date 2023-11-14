@extends('layouts.default_layout')
@section('content')

<style>
    .badge > a {
        color: inherit;
    }
    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

</style>

    <div class="content">

        @foreach($categorizedObjects as $item => $val)
        <div class="b-example-divider"></div>
        <h1> {{ $item }} </h1>
            @foreach($val as $item_second => $value_second)
                <div class="d-flex gap-2 justify-content-center py-5">
                    <span class="badge text-bg-primary rounded-pill">{{ $value_second->description }}</span>


                </div>
            @endforeach

        @endforeach









    </div>


@stop



