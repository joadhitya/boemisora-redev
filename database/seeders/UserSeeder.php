<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 'cXvYiULCFmZBLgj35m4zA',
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '08176731986',
            'sex' => NULL,
            'role_name' => 'Super Admin',
            'bg_color' => '#f07f9c',
            'id_role' => 1
        ]);
    }
}
