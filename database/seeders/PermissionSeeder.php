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
                'name' => 'Visualizar Página Home',
                'slug' => Str::slug('Visualizar Página Home'),
            ],
            [
                'name' => 'Visualizar Página Posts',
                'slug' => Str::slug('Visualizar Página Posts'),
            ],
        ];

        foreach($permissions as $permission) {
            Permission::insert([
                'name' => $permission["name"],
                'slug' => $permission["slug"],
            ]);
        }
    }
}