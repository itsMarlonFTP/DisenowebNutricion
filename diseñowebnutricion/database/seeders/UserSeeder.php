<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario con ID 1
        User::create([
            'userID' => 1,
            'name' => 'Admin',
            'email' => 'admin@nutricion.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
