<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Global Admin',
            'email' => 'ga@example.com',
            'password' => Hash::make('StrongPassword123!'),
            'roles_id' => 1,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('StrongPassword123!'),
            'roles_id' => 2,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('StrongPassword123!'),
            'roles_id' => 3,
        ]);
    }
}
