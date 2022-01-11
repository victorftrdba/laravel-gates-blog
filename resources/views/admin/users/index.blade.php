@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        @can('Criar Novo Usuário')
        <div class="col-4 mb-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Novo Usuário
            </button>
            @include('admin.users._modal_addUser')
        </div>
        @endcan
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <th>Nome do Usuário</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    @can('Editar Usuários')
                    <th>Ações</th>
                    @endcan
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @foreach($user->roles as $item)
                                <li>{{ $item->name }}</li>
                            @endforeach
                        </td>
                        @can('Editar Usuários')
                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-pen"></i></a>
                            <button type="button" data-user="{{ $user->id }}"  class="btn btnDeleteUser"><i class="fas fa-trash"></i></button>
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
