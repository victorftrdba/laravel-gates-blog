@extends('auth.layout.app')

@section('content')

<div class="container" style='position: absolute;top:50%;left:50%;transform:translate(-50%, -50%)'>
    <form class="row justify-content-center align-items-center" action="{{ route('auth.login.authenticate') }}" method="POST">
        @csrf
        <div class="col-12">
            <h2 class="text-center fw-bold text-uppercase">Painel Administrativo</h2>
            @if(session('error'))
                <div class="alert alert-danger text-center fw-bold text-uppercase">
                    {{ session('error') }}
                </div>
            @endif
            <div class="mb-4">
                <label for="email" class=>E-mail</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-4">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary rounded-0">Autenticar</button>
            </div>
        </div>
    </form>
</div>

@endsection
