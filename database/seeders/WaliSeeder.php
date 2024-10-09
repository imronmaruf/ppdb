<?php

namespace Database\Seeders;


use App\Models\Ortu;
use App\Models\Wali;
use App\Models\PesertaPpdb;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;


class WaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        // Data wali yang akan diinputkan, dengan nama peserta sebagai kunci
        $dataWali = [
            'Muhammad Asril' => [
                'nama_wali' => 'Rusli',
                'tahun_lahir' => '1995',
                'pendidikan' => 'SD',
                'pekerjaan' => 'Tani',
                'alamat' => 'Paloh Lada, Dusun Glee Madat',
            ],
            'Husnul Khatimah' => [
                'nama_wali' => 'M. Kadafi',
                'tahun_lahir' => '2003',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Buruh',
                'alamat' => 'Lhokseumawe',
            ],
            'Anara Shakila' => [
                'nama_wali' => '-', // Tidak ada data
                'tahun_lahir' => '-', // Tidak ada data
                'pendidikan' => '-', // Tidak ada data
                'pekerjaan' => '-', // Tidak ada data
                'alamat' => '-', // Tidak ada data
            ],
            'Zawil Aziza' => [
                'nama_wali' => 'Jufrizal',
                'tahun_lahir' => '1982',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tani',
                'alamat' => 'Tumpeun',
            ],
            'Sofyan Hassouri' => [
                'nama_wali' => 'Jama luddin',
                'tahun_lahir' => '1982',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tani',
                'alamat' => 'Dusun-3 Glee Baro, Paloh Gadeng',
            ],
            'Cut Adiva Arsyila Savina' => [
                'nama_wali' => 'Saifullah',
                'tahun_lahir' => '1999',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Tani',
                'alamat' => 'Paloh Lada, Dusun Glee Madat',
            ],
            'Sirajuddin' => [
                'nama_wali' => 'Nazaruddin',
                'tahun_lahir' => '1971',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Tukang',
                'alamat' => 'Tambon Baroh',
            ],
            'Shally Luthfia' => [
                'nama_wali' => 'Abdullah',
                'tahun_lahir' => '1984',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tani',
                'alamat' => 'Tambon Tunong, Dusung Urong Bugeng',
            ],
            'Mahyul Fata' => [
                'nama_wali' => '-', // Tidak ada data
                'tahun_lahir' => '-', // Tidak ada data
                'pendidikan' => '-', // Tidak ada data
                'pekerjaan' => '-', // Tidak ada data
                'alamat' => '-', // Tidak ada data
            ],
            'Cut Khaushatul Aqila' => [
                'nama_wali' => 'Jalaluddin',
                'tahun_lahir' => '1990',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Tani',
                'alamat' => 'Dusun Madat, Gampong Paloh Lada',
            ],
            'Chalisa Adiva' => [
                'nama_wali' => 'Muhibsuddin Hasan',
                'tahun_lahir' => '1971',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Dusun Madat, Gampong Paloh Lada',
            ],
            'Muhammad Afzal' => [
                'nama_wali' => 'Amiruddin',
                'tahun_lahir' => '1974',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tani',
                'alamat' => 'Paloh Lada, Dusun Madat',
            ],
            'Najwa Faradisa' => [
                'nama_wali' => 'T. Zainuddin',
                'tahun_lahir' => '1985',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Dusun Arongan, Blang Pulo',
            ],
            'Rizka Munira' => [
                'nama_wali' => 'Abdul Halim',
                'tahun_lahir' => '1973',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'BTN PIM, Glee Madat Ceudah',
            ],
            'Rizki Maulana' => [
                'nama_wali' => 'Samsul Bahri',
                'tahun_lahir' => '-',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Jamuan',
            ],
            'Muhammad Zaki' => [
                'nama_wali' => 'Safrizal',
                'tahun_lahir' => '1996',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Dagang',
                'alamat' => 'Geudong',
            ],
            'Fatih Rizka Fadhila Gulo' => [
                'nama_wali' => '-', // Gunakan '-' untuk data kosong
                'tahun_lahir' => '-',
                'pendidikan' => '-',
                'pekerjaan' => '-',
                'alamat' => '-',
            ],
            'Muhammad Ghautsil' => [
                'nama_wali' => 'Fakruddin',
                'tahun_lahir' => '1982',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tukang Bangunan',
                'alamat' => 'Simpang Mulieng',
            ],
            'Muhammad Azzar Kani' => [
                'nama_wali' => 'Razali',
                'tahun_lahir' => '1976',
                'pendidikan' => 'SD',
                'pekerjaan' => 'Buruh',
                'alamat' => 'Glee Madat',
            ],
            'Sayed Yusuf' => [
                'nama_wali' => 'Sayed Fajriadi',
                'tahun_lahir' => '1981',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Karyawan Swasta',
                'alamat' => 'Tambon Tunong',
            ],
            'Muhammad Tsaqif Ar Raqi' => [
                'nama_wali' => 'Mishadi',
                'tahun_lahir' => '1984',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Tani',
                'alamat' => 'Ds. Pie, Kec. Samudra, Aceh Utara',
            ],
            'Najmuddin' => [
                'nama_wali' => 'Muhammad Immran',
                'tahun_lahir' => '1987',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Buruh',
                'alamat' => 'Dusun-3 Glee Baro',
            ],
            'Hauratul Jinan' => [
                'nama_wali' => 'Saifanur',
                'tahun_lahir' => '1993',
                'pendidikan' => 'SMA',
                'pekerjaan' => '-', // Data kosong
                'alamat' => 'Glee Madat, Paloh Lada',
            ],
            'Nasla Annafisa' => [
                'nama_wali' => 'Muhammad Fitri',
                'tahun_lahir' => '1990',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Kuli Bangunan',
                'alamat' => 'Krueng Batee, Tapak Tuan, Aceh Selatan',
            ],
            'Siti Maysarah' => [
                'nama_wali' => 'Ismuhar',
                'tahun_lahir' => '2000',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tani',
                'alamat' => 'Meunjepayong',
            ],
            'T. Muhammad Fuzari' => [
                'nama_wali' => 'Teuku Rifhaldi',
                'tahun_lahir' => '2003',
                'pendidikan' => 'SMA',
                'pekerjaan' => 'Mahasiswa',
                'alamat' => 'Dusun Madat, Gampong Paloh Lada',
            ],
            'Abrar Azizi' => [
                'nama_wali' => 'M. Yusuf',
                'tahun_lahir' => '1969',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Tani',
                'alamat' => 'Paloh Kaye, Kunyet',
            ],
            'Nurfahiya' => [
                'nama_wali' => 'Mulyadi',
                'tahun_lahir' => '1983',
                'pendidikan' => 'SMP',
                'pekerjaan' => 'Buruh',
                'alamat' => 'Tb. Tunong',
            ],
        ];

        // Looping melalui data wali untuk mencocokkan dengan peserta PPDB
        foreach ($dataWali as $namaPeserta => $wali) {
            // Cari peserta PPDB berdasarkan nama
            $peserta = PesertaPpdb::where('name', $namaPeserta)->first();

            if ($peserta) {
                // Cari data ortu berdasarkan peserta
                $ortu = Ortu::where('peserta_ppdb_id', $peserta->id)->first();

                // Jika data wali kosong atau "-"
                if ($wali['nama_wali'] === '-' && $wali['tahun_lahir'] === '-' && $wali['pendidikan'] === '-' && $wali['pekerjaan'] === '-' && $wali['alamat'] === '-') {
                    // Jika data ortu ditemukan, ambil data ayah
                    if ($ortu) {
                        $wali['nama_wali'] = $ortu->nama_ayah;
                        // $wali['tahun_lahir'] = $ortu->tanggal_lahir_ayah->format('Y'); // Ubah format jika perlu
                        $wali['tahun_lahir'] = $ortu->tanggal_lahir_ayah ? Carbon::parse($ortu->tanggal_lahir_ayah)->format('Y') : $faker->year;
                        $wali['pendidikan'] = $ortu->pendidikan_ayah;
                        $wali['pekerjaan'] = $ortu->pekerjaan_ayah;
                        $wali['alamat'] = $ortu->alamat_ayah;
                    } else {
                        // Jika tidak ada data ortu, gunakan data faker
                        $wali['nama_wali'] = $faker->name;
                        $wali['tahun_lahir'] = $faker->year;
                        $wali['pendidikan'] = $faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
                        $wali['pekerjaan'] = $faker->jobTitle;
                        $wali['alamat'] = $faker->address;
                    }
                }

                // Buat data wali
                Wali::create([
                    'peserta_ppdb_id' => $peserta->id,
                    'nama_wali' => $wali['nama_wali'],
                    'tahun_lahir' => $wali['tahun_lahir'],
                    'pendidikan' => $wali['pendidikan'],
                    'pekerjaan' => $wali['pekerjaan'],
                    'alamat' => $wali['alamat'],
                    'created_at' => Carbon::create(2024, 5, rand(1, 31)), // Tahun 2024 dengan hari acak

                    'updated_at' => Carbon::create(2024, 5, rand(1, 31)),
                ]);
            } else {
                // Jika peserta tidak ditemukan, tambahkan log
                Log::warning("Peserta dengan nama {$namaPeserta} tidak ditemukan.");
            }
        }
    }
}
