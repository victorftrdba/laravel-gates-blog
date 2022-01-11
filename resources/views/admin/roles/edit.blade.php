@extends('admin.layout.app')

@section('content')

<div class="container">
    <form class="row mt-5" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
        @csrf
        @method('PUT')
        <div class="col-6">
            <label for="name">Nome do Perfil</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}"/>
        </div>
        <div class="col-6 mb-5">
            <label for="permissions">Permissões</label>
            <select class="form-select" name="id[]" multiple>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Salvar</button>
    </form>
</div>

@endsection
