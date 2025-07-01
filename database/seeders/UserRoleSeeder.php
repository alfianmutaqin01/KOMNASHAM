<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if not exist
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin Komnas HAM',
            'email' => 'admin@komnasham.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        // Create Komisioner user
        $user = User::create([
            'name' => 'Komisioner A',
            'email' => 'user@komnasham.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        $user->assignRole('user');
    }
}