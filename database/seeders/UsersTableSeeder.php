<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '12345678',
            ]
        );
    }
}
