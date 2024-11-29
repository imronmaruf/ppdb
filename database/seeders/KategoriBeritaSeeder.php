<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Berita', 'slug' => 'berita'],
            ['name' => 'Pengumuman', 'slug' => 'pengumuman'],

        ];

        foreach ($categories as $category) {
            KategoriBerita::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
            ]);
        }
    }
}
