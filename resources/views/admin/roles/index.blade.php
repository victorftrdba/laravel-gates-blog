@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        @can('Criar Novo Perfil')
        <div class="col-4 mb-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Novo Perfil
            </button>
            @include('admin.roles._modal_addRole')
        </div>
        @endcan
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <th>Nome do Perfil</th>
                    <th>Permissões</th>
                    @can('Editar Perfil')
                    <th>Ações</th>
                    @endcan
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td>
                            @foreach($role->permissions as $item)
                            <li>{{ $item->name }}</li>
                            @endforeach
                        </td>
                        @can('Editar Perfil')
                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.roles.edit', $role->id) }}"><i class="fas fa-pen"></i></a>
                            <button type="button" data-id="{{ $role->id }}" class="btn btnDeleteRole"><i class="fas fa-trash"></i></button>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
