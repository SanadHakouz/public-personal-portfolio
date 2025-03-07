<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Check if admin already exists
    if (!User::where('email', 'test@test.com')->exists()) {
        User::create([
            'name' => 'Admin Pepe',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
    }
}
}
