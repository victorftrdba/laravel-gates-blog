<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Victor Nogueira',
                'email' => 'victor@gmail.com',
                'password' => Hash::make('dev102030'),
            ],
            [
                'name' => 'Desenvolvedor',
                'email' => 'dev@gmail.com',
                'password' => Hash::make('dev102030'),
            ],
        ];

        foreach($users as $user) {
            User::create([
                'name' => $user["name"],
                'email' => $user["email"],
                'password' => $user["password"]
            ]);
        }
    }
}