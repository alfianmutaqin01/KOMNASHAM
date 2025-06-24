<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Komnas HAM',
            'email' => 'admin@komnasham.com',
            'password' => Hash::make('password'),
            'role' => 'admin', 
        ]);

        // Buat User Komisioner 1
        User::create([
            'name' => 'Komisioner A',
            'email' => 'user@komnasham.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}