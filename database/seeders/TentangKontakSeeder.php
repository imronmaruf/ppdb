<?php

namespace Database\Seeders;

use App\Models\TentangKontak;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TentangKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TentangKontak::create([
            'konten_tentang' => 'SD NEGERI 18 DEWANTARA merupakan salah satu sekolah jenjang SD berstatus Negeri yang berada di wilayah Kec. Dewantara, Kab. Aceh Utara, Aceh. SD NEGERI 18 DEWANTARA didirikan pada tanggal 16 Juli 2006 dengan Nomor SK Pendirian 2007 yang berada dalam naungan Kementerian Pendidikan dan Kebudayaan. Dengan adanya keberadaan SD NEGERI 18 DEWANTARA, diharapkan dapat memberikan kontribusi dalam mencerdaskan anak bangsa di wilayah Kec. Dewantara, Kab. Aceh Utara.',
            'foto' => 'landing/img/img3.jpg', // Foto path relative to 'public' folder
            'alamat' => 'Dusun Madat Gampong Paloh Lada, Paloh Lada, Kec. Dewantara, Kab. Aceh Utara, Aceh.',
            'email' => 'sdneger18dwt@gmail.com',
            'no_telp' => '08116881828',
            'wa_link' => 'https://api.whatsapp.com/send/?phone=628116881828&text&type=phone_number&app_absent=0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
