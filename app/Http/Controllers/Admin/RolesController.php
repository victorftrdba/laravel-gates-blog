<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index()
    {
        $this->authorize('Visualizar Página Perfis');

        $roles = Role::orderBy('name', 'asc')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function edit($id)
    {
        $this->authorize('Editar Perfil');

        $permissions = Permission::orderBy('name', 'asc')->get();

        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update($id, Request $request)
    {
        $this->authorize('Editar Perfil');

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
        ]);

        $role->permissions()->sync([]);

        if ($request->get('id') > 0) {
            foreach($request->get('id') as $id) {
                $role->permissions()->attach($id);
            }
        }

        return redirect()->route('admin.roles.index');
    }

    public function store(Request $request)
    {
        $this->authorize('Criar Novo Perfil');

        Role::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function delete($id)
    {
        $this->authorize('Excluir Perfil');

        $role = Role::findOrFail($id);
        $role->permissions()->sync([]);
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}