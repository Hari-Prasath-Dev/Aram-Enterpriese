<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('12345678'),
            'status' => 1
        ];

        // Check if user already exists
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            // 👉 Update existing user
            $user->update($data);
        } else {
            // 👉 Create new user
            User::create($data);
        }
    }
}
