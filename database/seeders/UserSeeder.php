<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1],

            ['name' => 'Ali',
            'email' => 'magjcd@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 2]
        ];

        User::insert($user);
    }
}
