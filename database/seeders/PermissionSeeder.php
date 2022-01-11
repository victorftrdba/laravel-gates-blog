<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'name' => 'Visualizar Página Dashboard',
                'slug' => Str::slug('Visualizar Página Dashboard'),
            ],
            [
                'id' => 2,
                'name' => 'Visualizar Página Posts',
                'slug' => Str::slug('Visualizar Página Posts'),
            ],
            [
                'id' => 3,
                'name' => 'Visualizar Página Perfis',
                'slug' => Str::slug('Visualizar Página Perfis'),
            ],
            [
                'id' => 4,
                'name' => 'Editar Perfil',
                'slug' => Str::slug('Editar Perfil'),
            ],
            [
                'id' => 5,
                'name' => 'Editar Usuários',
                'slug' => Str::slug('Editar Usuários'),
            ],
            [
                'id' => 6,
                'name' => 'Visualizar Página Usuários',
                'slug' => Str::slug('Visualizar Página Usuários'),
            ],
            [
                'id' => 7,
                'name' => 'Editar Posts',
                'slug' => Str::slug('Editar Posts'),
            ],
            [
                'id' => 8,
                'name' => 'Criar Novo Perfil',
                'slug' => Str::slug('Criar Novo Perfil'),
            ],
            [
                'id' => 9,
                'name' => 'Criar Novo Usuário',
                'slug' => Str::slug('Criar Novo Usuário'),
            ],
            [
                "id" => 10,
                'name' => 'Excluir Perfil',
                'slug' => Str::slug('Excluir Perfil'),
            ],
            [
                'id' => 11,
                'name' => 'Excluir Usuário',
                'slug' => Str::slug('Excluir Usuário'),
            ],
        ];

        foreach($permissions as $permission) {
            $res = Permission::find($permission["id"]);

            if($res) {
                $res->update($permission);
            } else {
                Permission::create([
                    'name' => $permission["name"],
                    'slug' => $permission["slug"],
                ]);
            }
        }
    }
}
