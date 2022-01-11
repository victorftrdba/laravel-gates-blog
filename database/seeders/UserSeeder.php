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
                'id' => 1,
                'name' => 'Victor Nogueira',
                'email' => 'victor@gmail.com',
                'password' => Hash::make('dev102030'),
            ],
            [
                'id' => 2,
                'name' => 'Desenvolvedor',
                'email' => 'dev@gmail.com',
                'password' => Hash::make('dev102030'),
            ],
        ];

        foreach($users as $user) {
            $res = User::find($user["id"]);

            if($res) {
                $res->update($user);
            } else {
                User::create([
                    'name' => $user["name"],
                    'email' => $user["email"],
                    'password' => $user["password"]
                ]);
            }
        }
    }
}