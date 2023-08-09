<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'Admin',
                'email'           => 'admin@admin.com',
                'email_verified_at' => now(),
                'password'        => bcrypt('password'),
                'is_active'        => 1,
                'remember_token'  => null,
                'two_factor_code' => '',
            ],
        ];

        User::insert($users);
    }
}
