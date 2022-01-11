@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center fw-bold text-uppercase">
            <div>
                Olá, {{ Auth::user()->name }}!
            </div>
            <div>
                atualmente sua função é <span class="text-danger">{{ Auth::user()->roles->first()->name }}</span> em nosso sistema.
            </div>
        </div>
    </div>
</div>

@endsection
