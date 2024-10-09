<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'role' => 'siswa',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Marzuki Yahya, S.Pd',
            'email' => 'kepsek@gmail.com',
            'role' => 'kepsek',
            'password' => Hash::make('password'),
        ]);

        $users = [
            ['name' => 'Muhammad Asril', 'email' => 'asril@gmail.com'],
            ['name' => 'Husnul Khatimah', 'email' => 'husnul@gmail.com'],
            ['name' => 'Anara Shakila', 'email' => 'anara@gmail.com'],
            ['name' => 'Zawil Aziza', 'email' => 'zawil@gmail.com'],
            ['name' => 'Sofyan Hassouri', 'email' => 'sofyan@gmail.com'],
            ['name' => 'Cut Adiva Arsyila Savina', 'email' => 'adiva@gmail.com'],
            ['name' => 'Sirajuddin', 'email' => 'sirajuddin@gmail.com'],
            ['name' => 'Shally Luthfia', 'email' => 'shally@gmail.com'],
            ['name' => 'Mahyul Fata', 'email' => 'mahyul@gmail.com'],
            ['name' => 'Cut Khaushatul Aqila', 'email' => 'khaushatul@gmail.com'],
            ['name' => 'Chalisa Adiva', 'email' => 'chalisa@gmail.com'],
            ['name' => 'Muhammad Afzal', 'email' => 'afzal@gmail.com'],
            ['name' => 'Najwa Faradisa', 'email' => 'najwa@gmail.com'],
            ['name' => 'Rizka Munira', 'email' => 'rizka@gmail.com'],
            ['name' => 'Rizki Maulana', 'email' => 'rizki@gmail.com'],
            ['name' => 'Muhammad Zaki', 'email' => 'zaki@gmail.com'],
            ['name' => 'Fatih Rizka Fadhila Gulo', 'email' => 'fatih@gmail.com'],
            ['name' => 'Muhammad Ghautsil', 'email' => 'ghautsil@gmail.com'],
            ['name' => 'Muhammad Azzar Kani', 'email' => 'azzar@gmail.com'],
            ['name' => 'Sayed Yusuf', 'email' => 'sayed@gmail.com'],
            ['name' => 'Muhammad Tsaqif Ar Raqi', 'email' => 'tsaqif@gmail.com'],
            ['name' => 'Najmuddin', 'email' => 'najmuddin@gmail.com'],
            ['name' => 'Hauratul Jinan', 'email' => 'hauratul@gmail.com'],
            ['name' => 'Nasla Annafisa', 'email' => 'nasla@gmail.com'],
            ['name' => 'Siti Maysarah', 'email' => 'maysarah@gmail.com'],
            ['name' => 'T. Muhammad Fuzari', 'email' => 'fuzari@gmail.com'],
            ['name' => 'Abrar Azizi', 'email' => 'abrar@gmail.com'],
            ['name' => 'Nurfahiya', 'email' => 'nurfahiya@gmail.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => 'siswa',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
