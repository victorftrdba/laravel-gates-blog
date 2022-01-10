@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <th>Nome do Perfil</th>
                    <th>Permissões</th>
                    <th>Ações</th>
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
                        <td>
                            <a href="{{ route('admin.roles.edit', $role->id) }}">Editar</a>
                            Excluir
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
