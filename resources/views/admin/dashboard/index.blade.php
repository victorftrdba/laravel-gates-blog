@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            Hello, {{ Auth::user()->name }}
        </div>
    </div>
</div>

@endsection
