<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => Str::slug('Administrador'),
            ],
            [
                'name' => 'Usuário',
                'slug' => Str::slug('Usuário'),
            ],
        ];

        foreach($roles as $role) {
            Role::insert([
                'name' => $role["name"],
                'slug' => $role["slug"],
            ]);
        }
    }
}