<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('Visualizar Página Usuários');

        $users = User::orderBy('created_at', 'desc')->get();

        $roles = Role::get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function edit($id)
    {
        $this->authorize('Editar Usuários');

        $user = User::findOrFail($id);

        $roles = Role::get();

        return view('admin.users.edit', compact("user", "roles"));
    }

    public function update($id, Request $request)
    {
        $this->authorize('Editar Usuários');

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        $user->roles()->sync([]);
        $user->roles()->attach($request->get('id'));

        return redirect()->route('admin.users.index');
    }

    public function store(Request $request)
    {
        $this->authorize('Criar Novo Usuário');

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->roles()->attach($request->get('id'));

        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        $this->authorize('Excluir Usuário');

        $user = User::findOrFail($id);
        $user->roles()->sync([]);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}