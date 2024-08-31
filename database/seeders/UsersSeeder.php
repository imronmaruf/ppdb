<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'role' => 'siswa',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'kepsek',
            'email' => 'kepsek@gmail.com',
            'role' => 'kepsek',
            'password' => bcrypt('password'),
        ]);
    }
}
