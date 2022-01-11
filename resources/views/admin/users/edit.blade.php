@extends('admin.layout.app')

@section('content')

<div class="container">
    <form class="row mt-5" method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div class="col-6">
            <label for="name">Nome do Usuário</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
        </div>
        <div class="col-6">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="col-6 mb-5">
            <label for="permissions">Perfil</label>
            <select class="form-select" name="id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Salvar</button>
    </form>
</div>

@endsection
