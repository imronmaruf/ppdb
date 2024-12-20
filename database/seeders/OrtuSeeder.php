<?php

namespace Database\Seeders;

use App\Models\Ortu;
use App\Models\PesertaPpdb;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class OrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        // Data orang tua yang akan diinputkan, dengan nama peserta sebagai kunci
        $dataOrtu = [
            'Muhammad Asril' => [
                'nama_ayah' => 'Karimuddin',
                'nama_ibu' => 'Hajiah',
                'alamat_ayah' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'alamat_ibu' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'tempat_lahir_ayah' => 'Aceh Utara',
                'tanggal_lahir_ayah' => '1975-04-10',
                'tempat_lahir_ibu' => 'Aceh Utara',
                'tanggal_lahir_ibu' => '1980-06-05',
                'nik_ayah' => '1108021604180001',
                'nik_ibu' => '1108024301190001',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Petani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Husnul Khatimah' => [
                'nama_ayah' => 'Musmuliadi',
                'nama_ibu' => 'Badriah',
                'alamat_ayah' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'alamat_ibu' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'tempat_lahir_ayah' => 'Aceh Utara',
                'tanggal_lahir_ayah' => '1977-11-16',
                'tempat_lahir_ibu' => 'Aceh Utara',
                'tanggal_lahir_ibu' => '1980-06-11',
                'nik_ayah' => '1108021611770001',
                'nik_ibu' => '1108025106800000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Buruh',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Anara Shakila' => [
                'nama_ayah' => 'Iskandar',
                'nama_ibu' => 'Eka Yanti',
                'alamat_ayah' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'alamat_ibu' => 'Dusun Madat',
                'tempat_lahir_ayah' => 'Paloh Lada',
                'tanggal_lahir_ayah' => '1988-07-01',
                'tempat_lahir_ibu' => 'Keutapang',
                'tanggal_lahir_ibu' => '1989-06-18',
                'nik_ayah' => '1108020107870433',
                'nik_ibu' => '1108165806890000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Zawil Aziza' => [
                'nama_ayah' => 'M. Junaidi',
                'nama_ibu' => 'Lia Wati',
                'alamat_ayah' => 'Blok.7',
                'alamat_ibu' => 'Dusun Urong Bugeng',
                'tempat_lahir_ayah' => 'Blok.7',
                'tanggal_lahir_ayah' => '1992-06-05',
                'tempat_lahir_ibu' => 'Tambon Tunong',
                'tanggal_lahir_ibu' => '1992-10-12',
                'nik_ayah' => '1108030506920007',
                'nik_ibu' => '1108024107920500',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Sofyan Hassouri' => [
                'nama_ayah' => 'Rizaldi. M',
                'nama_ibu' => 'Zahra. Nurdin',
                'alamat_ayah' => 'Barung-barung Belantai',
                'alamat_ibu' => 'Dusun-3, Glee Baro',
                'tempat_lahir_ayah' => 'Barung-barung Belantai',
                'tanggal_lahir_ayah' => '1974-04-24',
                'tempat_lahir_ibu' => 'Paloh Gadeng',
                'tanggal_lahir_ibu' => '1980-10-30',
                'nik_ayah' => '1401062404740013',
                'nik_ibu' => '1471087010800000',
                'pendidikan_ayah' => 'SD',
                'pendidikan_ibu' => 'SD',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Cut Adiva Arsyila Savina' => [
                'nama_ayah' => 'Bawi',
                'nama_ibu' => 'Zuryati',
                'alamat_ayah' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'alamat_ibu' => 'Paloh Lada, Glee Madat, Dewantara, Aceh Utara',
                'tempat_lahir_ayah' => 'Paloh Lada',
                'tanggal_lahir_ayah' => '1987-05-06',
                'tempat_lahir_ibu' => 'Ujong Bayu',
                'tanggal_lahir_ibu' => '1988-03-01',
                'nik_ayah' => '1108020505870008',
                'nik_ibu' => '1111074103880000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Sirajuddin' => [
                'nama_ayah' => 'Murtala',
                'nama_ibu' => 'Husnani',
                'alamat_ayah' => 'Paya Gaboh',
                'alamat_ibu' => 'Tambon Tunong, Dusun-5, Urong Bugeng',
                'tempat_lahir_ayah' => 'Paya Gaboh',
                'tanggal_lahir_ayah' => '1973-07-01',
                'tempat_lahir_ibu' => 'Blang Riek',
                'tanggal_lahir_ibu' => '1982-07-01',
                'nik_ayah' => '1108020107730389',
                'nik_ibu' => '1108029107820570',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Tuang',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Shally Luthfia' => [
                'nama_ayah' => 'Baharuddin',
                'nama_ibu' => 'Riwayati',
                'alamat_ayah' => 'Tambon Tunong, Dusun Urong Bugeng',
                'alamat_ibu' => 'Dusun Urong Bugeng',
                'tempat_lahir_ayah' => 'Tambon Tunong',
                'tanggal_lahir_ayah' => '1978-07-01',
                'tempat_lahir_ibu' => 'Tambon Tunong',
                'tanggal_lahir_ibu' => '1989-09-15',
                'nik_ayah' => '1108020107780310',
                'nik_ibu' => '1108025509890000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Mahyul Fata' => [
                'nama_ayah' => 'Munawar',
                'nama_ibu' => 'Rahmani',
                'alamat_ayah' => 'Paloh Lada, Dusun Madat',
                'alamat_ibu' => 'Dusun Madat',
                'tempat_lahir_ayah' => 'Paloh Lada',
                'tanggal_lahir_ayah' => '1988-07-04',
                'tempat_lahir_ibu' => 'Alue Sagoe Weng',
                'tanggal_lahir_ibu' => '1995-09-06',
                'nik_ayah' => '1108020407880001',
                'nik_ibu' => '1108034609950000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Cut Khaushatul Aqila' => [
                'nama_ayah' => 'Miftahuddin',
                'nama_ibu' => 'Wardiati',
                'alamat_ayah' => 'Dusun Madat, Gampong Paloh Lada',
                'alamat_ibu' => 'Dusun Madat, Gampong Paloh Lada',
                'tempat_lahir_ayah' => 'Matang Mane',
                'tanggal_lahir_ayah' => '1990-10-05',
                'tempat_lahir_ibu' => 'Paloh Lada',
                'tanggal_lahir_ibu' => '1994-04-05',
                'nik_ayah' => '1108120510900002',
                'nik_ibu' => '1108024507940000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'S1',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Chalisa Adiva' => [
                'nama_ayah' => 'Abdullah',
                'nama_ibu' => 'Nurmalis',
                'alamat_ayah' => 'Tambon Tunong, Dusun Urong Bugeng',
                'alamat_ibu' => 'Tambon Tunong, Dusun Urong Bugeng',
                'tempat_lahir_ayah' => 'Tambon Tunong',
                'tanggal_lahir_ayah' => '1984-07-01',
                'tempat_lahir_ibu' => 'Paloh Kayee Kunyet',
                'tanggal_lahir_ibu' => '1994-10-02',
                'nik_ayah' => '1108020107840373',
                'nik_ibu' => '1108164210940000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Muhammad Afzal' => [
                'nama_ayah' => 'Muhammad Nasir',
                'nama_ibu' => 'Nurfazillah',
                'alamat_ayah' => 'Paloh Lada, Dusun Madat',
                'alamat_ibu' => 'Paloh Lada, Dusun Madat',
                'tempat_lahir_ayah' => 'Krueng Geukueh',
                'tanggal_lahir_ayah' => '1985-05-18',
                'tempat_lahir_ibu' => 'Kunyet Mute',
                'tanggal_lahir_ibu' => '1984-07-12',
                'nik_ayah' => '1108021605690002',
                'nik_ibu' => '1108054803940000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Najwa Faradisa' => [
                'nama_ayah' => 'T. Nifuddin',
                'nama_ibu' => 'Muaslina',
                'alamat_ayah' => 'Tambon Tunong, Dussun-5, Urong Bugeng',
                'alamat_ibu' => 'Tambon Tunong, Dussun-5, Urong Bugeng',
                'tempat_lahir_ayah' => 'Ulee Nyeue',
                'tanggal_lahir_ayah' => '1974-02-05',
                'tempat_lahir_ibu' => 'Urong Bugeng',
                'tanggal_lahir_ibu' => null,  // Tidak ada tanggal lahir yang diberikan untuk ibu
                'nik_ayah' => '1108162606840001',
                'nik_ibu' => '1108026104910000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Rizka Munira' => [
                'nama_ayah' => 'Rizal Fasya',
                'nama_ibu' => 'Sri Afdhayani',
                'alamat_ayah' => 'BTN PIM Glee Madat, Jln. Mahoni 2 C5. No.04',
                'alamat_ibu' => 'BTN PIM Glee Madat, Jln. Mahoni 2 C5. No.04',
                'tempat_lahir_ayah' => 'Cot Dua',
                'tanggal_lahir_ayah' => '1978-08-01',
                'tempat_lahir_ibu' => 'Sigli',
                'tanggal_lahir_ibu' => '1981-10-07',
                'nik_ayah' => '1108020108780003',
                'nik_ibu' => '1108024710810000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Buruh',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Rizki Maulana' => [
                'nama_ayah' => 'M. Nasir',
                'nama_ibu' => 'Midarwati',
                'alamat_ayah' => 'Jamuan',
                'alamat_ibu' => 'Glee Madat',
                'tempat_lahir_ayah' => 'Jamuan',
                'tanggal_lahir_ayah' => '1976-08-17',
                'tempat_lahir_ibu' => 'Glee Madat',
                'tanggal_lahir_ibu' => '1984-10-11',
                'nik_ayah' => '1108151708760003',
                'nik_ibu' => '1108025110840000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Muhammad Zaki' => [
                'nama_ayah' => 'Tgk. Jarjarni',
                'nama_ibu' => 'Sofiatuddin',
                'alamat_ayah' => 'Dusun-1, Desa Paloh Gadeng',
                'alamat_ibu' => 'Dusun-1, Desa Paloh Gadeng',
                'tempat_lahir_ayah' => 'Baro Kutabate',
                'tanggal_lahir_ayah' => '1988-07-24',
                'tempat_lahir_ibu' => 'Mns. Tingkeum',
                'tanggal_lahir_ibu' => null,  // Tidak ada tanggal lahir yang diberikan
                'nik_ayah' => '1108072407880001',
                'nik_ibu' => '1103124104970000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Guru Ngaji',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Fatih Rizka Fadhila Gulo' => [
                'nama_ayah' => 'Abdul Salam Gulo',
                'nama_ibu' => 'Juniati',
                'alamat_ayah' => 'Dusun Madat',
                'alamat_ibu' => 'Dusun Madat',
                'tempat_lahir_ayah' => 'Meunasah Baro',
                'tanggal_lahir_ayah' => '1988-08-05',
                'tempat_lahir_ibu' => 'Paloh Lada',
                'tanggal_lahir_ibu' => '1991-02-10',
                'nik_ayah' => '1106040805880001',
                'nik_ibu' => '1108025002910000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Muhammad Ghautsil' => [
                'nama_ayah' => 'Zulkifli',
                'nama_ibu' => 'Nur Mulyati',
                'alamat_ayah' => 'Paloh Lada',
                'alamat_ibu' => 'Paloh Lada',
                'tempat_lahir_ayah' => 'Mon Crang',
                'tanggal_lahir_ayah' => '1988-11-02',
                'tempat_lahir_ibu' => 'Bangka Jaya',
                'tanggal_lahir_ibu' => '1989-11-03',
                'nik_ayah' => '1108100211880001',
                'nik_ibu' => '1108024311890000',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'S1',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Muhammad Azzar Kani' => [
                'nama_ayah' => 'Abdullah',
                'nama_ibu' => 'Ruhama M Yahya',
                'alamat_ayah' => 'Glee Madat',
                'alamat_ibu' => 'Glee Madat',
                'tempat_lahir_ayah' => 'Paloh Lada',
                'tanggal_lahir_ayah' => '1968-07-01',
                'tempat_lahir_ibu' => 'Paya Gaboh',
                'tanggal_lahir_ibu' => '1977-05-05',
                'nik_ayah' => '1108020107680324',
                'nik_ibu' => '1108154505770000',
                'pendidikan_ayah' => 'SD',
                'pendidikan_ibu' => 'SD',
                'pekerjaan_ayah' => 'Buruh',
                'pekerjaan_ibu' => 'Wiraswasta',
            ],
            'Sayed Yusuf' => [
                'nama_ayah' => 'Sayed Fachrurrazi',
                'nama_ibu' => 'Syarifah Humairah',
                'alamat_ayah' => 'Jln. Cemara No.B4 BTN PIM, Madat, Paloh Lada',
                'alamat_ibu' => 'Jln. Cemara No.B4 BTN PIM, Madat, Paloh Lada',
                'tempat_lahir_ayah' => 'Beureunuen',
                'tanggal_lahir_ayah' => '1979-04-23',
                'tempat_lahir_ibu' => 'Lamtutui',
                'tanggal_lahir_ibu' => '1984-04-17',
                'nik_ayah' => '1108022304790002',
                'nik_ibu' => '1108025704840000',
                'pendidikan_ayah' => 'S2',
                'pendidikan_ibu' => 'S1',
                'pekerjaan_ayah' => 'PNS',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Muhammad Tsaqif Ar Raqi' => [
                'nama_ayah' => 'Tgk. Mukhlis',
                'nama_ibu' => 'Mursyidah',
                'alamat_ayah' => 'Dusun Glee Madat, Gampong Paloh Lada, Kec. Deawantra',
                'alamat_ibu' => 'Dusun Glee Madat, Gampong Paloh Lada, Kec. Deawantra',
                'tempat_lahir_ayah' => 'Ds. Pie',
                'tanggal_lahir_ayah' => '1986-01-10',
                'tempat_lahir_ibu' => 'Ds. Trieng',
                'tanggal_lahir_ibu' => '1989-06-08',
                'nik_ayah' => '1108080608870001',
                'nik_ibu' => '1108054106890100',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'S1',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Najmuddin' => [
                'nama_ayah' => 'Syarbini Ibrahim',
                'nama_ibu' => 'Nurlina',
                'alamat_ayah' => 'Dusun-3, Glee Baro',
                'alamat_ibu' => 'Dusun-3, Glee Baro',
                'tempat_lahir_ayah' => 'Paloh Gadeng',
                'tanggal_lahir_ayah' => '1974-07-01',
                'tempat_lahir_ibu' => 'Leubu Masjid',
                'tanggal_lahir_ibu' => '1981-11-24',
                'nik_ayah' => '1108020107740242',
                'nik_ibu' => '1108024107800440',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Hauratul Jinan' => [
                'nama_ayah' => 'Ferian',
                'nama_ibu' => 'Zulfayani',
                'alamat_ayah' => 'Glee Madat, Paloh Lada',
                'alamat_ibu' => 'Glee Madat, Paloh Lada',
                'tempat_lahir_ayah' => 'Paloh Lada',
                'tanggal_lahir_ayah' => '1991-04-14',
                'tempat_lahir_ibu' => 'Darussalam',
                'tanggal_lahir_ibu' => '1995-06-24',
                'nik_ayah' => '1108021404910001',
                'nik_ibu' => '1111166406950000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Nasla Annafisa' => [
                'nama_ayah' => 'Safruddin',
                'nama_ibu' => 'Zuryani',
                'alamat_ayah' => 'Dusun Madat, Paloh Lada',
                'alamat_ibu' => 'Dusun Madat',
                'tempat_lahir_ayah' => 'Krueng Batee',
                'tanggal_lahir_ayah' => '1984-03-05',
                'tempat_lahir_ibu' => 'Dusun Madat',
                'tanggal_lahir_ibu' => '1978-01-11',
                'nik_ayah' => '1101020405880005',
                'nik_ibu' => '1108024107850440',
                'pendidikan_ayah' => 'SMA',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Siti Maysarah' => [
                'nama_ayah' => 'Muhammad',
                'nama_ibu' => 'Sri Maulida',
                'alamat_ayah' => 'Meunjepayong, Kec. Meurah Mulia',
                'alamat_ibu' => 'Ujomh Kuta Batee, Kec. Meuurah Mulia',
                'tempat_lahir_ayah' => 'Menjepeut',
                'tanggal_lahir_ayah' => '1982-12-12',
                'tempat_lahir_ibu' => 'Ujoung Kuta Batee',
                'tanggal_lahir_ibu' => '1997-08-17',
                'nik_ayah' => '1108071212820001',
                'nik_ibu' => '1108075708970000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'T. Muhammad Fuzari' => [
                'nama_ayah' => 'T. Abdullah',
                'nama_ibu' => 'Nurhanifah',
                'alamat_ayah' => 'Dusun Madat, Paloh Lada',
                'alamat_ibu' => 'Dusun Madat, Paloh Lada',
                'tempat_lahir_ayah' => 'Pulo Raya',
                'tanggal_lahir_ayah' => '1973-11-09',
                'tempat_lahir_ibu' => 'Glee Madat',
                'tanggal_lahir_ibu' => '1980-05-13',
                'nik_ayah' => '1108020911730002',
                'nik_ibu' => '1108024107790390',
                'pendidikan_ayah' => 'SD',
                'pendidikan_ibu' => 'SMA',
                'pekerjaan_ayah' => 'Tani',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Abrar Azizi' => [
                'nama_ayah' => 'Razali',
                'nama_ibu' => 'Muharam',
                'alamat_ayah' => 'Dusun Madat',
                'alamat_ibu' => 'Dusun Madat',
                'tempat_lahir_ayah' => 'Paloh Lada',
                'tanggal_lahir_ayah' => '1976-12-03',
                'tempat_lahir_ibu' => 'Paloh Lada',
                'tanggal_lahir_ibu' => '1980-12-12',
                'nik_ayah' => '1108020312760002',
                'nik_ibu' => '1108025212800000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SD',
                'pekerjaan_ayah' => 'Wiraswasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],
            'Nurfahiya' => [
                'nama_ayah' => 'Aswadi M. Kasem',
                'nama_ibu' => 'Martini',
                'alamat_ayah' => 'Dusun-5, Urong Bugeng',
                'alamat_ibu' => 'Urong Bugeng',
                'tempat_lahir_ayah' => 'Tb. Tunong',
                'tanggal_lahir_ayah' => '1982-04-20',
                'tempat_lahir_ibu' => 'Meunasah Pulo',
                'tanggal_lahir_ibu' => '1985-08-14',
                'nik_ayah' => '1108022004820001',
                'nik_ibu' => '1108025408850000',
                'pendidikan_ayah' => 'SMP',
                'pendidikan_ibu' => 'SMP',
                'pekerjaan_ayah' => 'Tukang Batu',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            ],

        ];

        // Looping melalui data orang tua untuk mencocokkan dengan peserta PPDB
        foreach ($dataOrtu as $namaPeserta => $ortu) {
            // Cari peserta PPDB berdasarkan nama
            $peserta = PesertaPpdb::where('name', $namaPeserta)->first();

            if ($peserta) {
                // Jika peserta ditemukan, buat data orang tua
                Ortu::create([
                    'peserta_ppdb_id' => $peserta->id,
                    'nama_ayah' => $ortu['nama_ayah'] ?? $faker->name('male'), // Isi dengan nama ayah atau random
                    'nama_ibu' => $ortu['nama_ibu'] ?? $faker->name('female'), // Isi dengan nama ibu atau random
                    'alamat_ayah' => $ortu['alamat_ayah'] ?? $faker->address, // Isi dengan alamat random
                    'alamat_ibu' => $ortu['alamat_ibu'] ?? $faker->address, // Isi dengan alamat random
                    'tempat_lahir_ayah' => $ortu['tempat_lahir_ayah'] ?? $faker->city, // Isi tempat lahir random
                    'tanggal_lahir_ayah' => $ortu['tanggal_lahir_ayah'] ?? $faker->date, // Isi tanggal random
                    'tempat_lahir_ibu' => $ortu['tempat_lahir_ibu'] ?? $faker->city, // Isi tempat lahir random
                    'tanggal_lahir_ibu' => $ortu['tanggal_lahir_ibu'] ?? $faker->date, // Isi tanggal lahir random jika null
                    'nik_ayah' => $ortu['nik_ayah'] ?? $faker->nik, // Isi NIK random jika null
                    'nik_ibu' => $ortu['nik_ibu'] ?? $faker->nik, // Isi NIK random jika null
                    'pendidikan_ayah' => $ortu['pendidikan_ayah'] ?? $faker->randomElement(['SD', 'SMP', 'SMA', 'S1']), // Pendidikan random
                    'pendidikan_ibu' => $ortu['pendidikan_ibu'] ?? $faker->randomElement(['SD', 'SMP', 'SMA', 'S1']),
                    'pekerjaan_ayah' => $ortu['pekerjaan_ayah'] ?? $faker->jobTitle, // Pekerjaan random
                    'pekerjaan_ibu' => $ortu['pekerjaan_ibu'] ?? 'Ibu Rumah Tangga', // Default Ibu Rumah Tangga
                    'created_at' => Carbon::create(2024, 5, rand(1, 31)), // Tahun 2024 dengan  hari acak
                    'updated_at' => Carbon::create(2024, 5, rand(1, 31)),
                ]);
            } else {
                // Jika peserta tidak ditemukan, tambahkan log
                Log::warning("Peserta dengan nama {$namaPeserta} tidak ditemukan.");
            }
        }
    }
}
