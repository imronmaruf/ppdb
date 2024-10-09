<?php

namespace Database\Seeders;

use App\Models\Berkas;
use App\Models\PesertaPpdb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua peserta dari tabel peserta_ppdb
        $pesertas = PesertaPpdb::all();

        foreach ($pesertas as $peserta) {
            // Tentukan path pas foto berdasarkan jenis kelamin
            $pasFotoPath = $peserta->jenis_kelamin === 'laki-laki'
                ? 'http://127.0.0.1:8001/uploads/lk.png'
                : 'http://127.0.0.1:8001/uploads/pr.jpg';

            // Buat data berkas
            Berkas::create([
                'peserta_ppdb_id' => $peserta->id,
                'akte_kelahiran' => 'http://127.0.0.1:8001/uploads/form.pdf',
                'kk' => 'http://127.0.0.1:8001/uploads/form.pdf',
                'ktp_ortu' => 'http://127.0.0.1:8001/uploads/form.pdf',
                'ijazah' => 'http://127.0.0.1:8001/uploads/form.pdf',
                'kartu_pkh' => 'http://127.0.0.1:8001/uploads/form.pdf',
                'pas_foto' => $pasFotoPath,
                'created_at' => Carbon::create(2024, 5, rand(1, 31)),
                'updated_at' => Carbon::create(2024, 5, rand(1, 31)),
            ]);
        }
    }
}
