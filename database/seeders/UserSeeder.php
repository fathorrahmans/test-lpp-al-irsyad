<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Dev',
            'email' => 'admindev@gmail.com',
            'password' => Hash::make('admindev'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Dev',
            'email' => 'userdev@gmail.com',
            'password' => Hash::make('userdev'),
            'role' => 'user',
        ]);
    }
}
