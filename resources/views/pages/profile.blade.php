@extends('layouts.default_layout')
@include('css.dashboard_css')

@section('content')

<form action="{{ route('edit.profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    @if (session('message'))
        <span class="text-success">{{ session('message') }}</span>
    @endif
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Name" value="{{ $user->name }}" readonly>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="{{ $user->email }}" readonly>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"></label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="image"   placeholder="Upload an image">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>



@stop
