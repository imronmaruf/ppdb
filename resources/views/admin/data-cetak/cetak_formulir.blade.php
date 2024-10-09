<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa_{{ Auth::user()->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            color: #000;
        }

        /* Mengurangi padding pada tabel untuk membuatnya lebih rapat */
        table th,
        table td {
            padding: 2px !important;
        }

        /* Menambah margin bawah untuk cetak */
        @media print {
            @page {
                size: A4;
                /* Mengatur ukuran kertas A4 */
                margin: 1cm 1.5cm 2cm 1.5cm;
                /* Margin: atas, kanan, bawah, kiri */
            }

            body {
                margin: 0;
                /* Menghilangkan margin body agar sesuai ukuran kertas */
            }

            .container {
                width: 100%;
                margin: 0;
            }
        }

        /* Atur footer di bagian bawah */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        .thick-hr {
            border: 0;
            height: 3px;
            /* margin-top: 10px; */
            /* Ketebalan garis atas */
            background-color: black;
            /* Warna hitam */
            width: 100%;
            /* Lebar garis */
        }

        .thin-hr {
            border: 0;
            height: 2px;
            /* Ketebalan garis bawah */
            background-color: black;
            /* Warna hitam */
            width: 96%;
            /* Lebar garis */
        }
    </style>
</head>

<body>
    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>FORMULIR PENDAFTARAN SISWA BARU</h1>
            <p>SD NEGERI 18 DEWANTARA</p>
            <p>Dusun Madat Gampong Paloh Lada Kecamatan Dewantara Kabupaten Aceh Utara 24354</p>
            <p>Email: sdnegeri18dwtbgmail.com</p>
        </div>
        <div>
            <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah" width="150">
        </div>
    </div> --}}

    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom pertama untuk logo -->
            <div class="col-2 text-left">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah" class="img-fluid" width="100">
            </div>

            <!-- Kolom kedua untuk teks yang berada di tengah -->
            <div class="col-8 text-center">
                <h2 class="mb-0">FORMULIR PENDAFTARAN SISWA BARU</h2>
                <h2 class="mb-0">SD NEGERI 18 DEWANTARA</h2>
                <p class="mb-0">Dusun Madat Gampong Paloh Lada Kecamatan Dewantara Kabupaten Aceh Utara 24354</p>
                <p class="mb-0">Email : {{ $email }}</p>
            </div>
            <!-- Kolom ketiga untuk ruang kosong -->
            <div class="col-2"></div>

        </div>

        <hr class="thick-hr mt-3 mb-3">
        {{-- <hr class="thin-hr"> --}}

    </div>

    <div class="container mt-4">
        <table class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th colspan="3" class="bg-light">A. IDENTITAS CALON SISWA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-weight-bold">1</td>
                    <td>Nama Lengkap Calon Siswa</td>
                    <td scope="col" class="w-75"> {{ ucfirst(Str::title($dataPendaftaran->name ?? '')) }}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">2</td>
                    <td>Jenis Kelamin</td>
                    <td scope="col" class="w-75">{{ ucfirst(Str::title($dataPendaftaran->jenis_kelamin ?? '')) }}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">3</td>
                    <td>Tempat Tanggal Lahir</td>
                    <td scope="col" class="w-75">
                        {{ ucfirst(Str::title($dataPendaftaran->tempat_lahir ?? '')) }},
                        {{ date('d-m-Y', strtotime($dataPendaftaran->tanggal_lahir)) ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">4</td>
                    <td>No. KK</td>
                    <td scope="col" class="w-75">{{ $dataPendaftaran->kk ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">5</td>
                    <td>Penerima PKH / No. Kartu PKH</td>
                    <td>{{ ucfirst(Str::title($dataPendaftaran->status_pkh)) ?? 'Data Belum Diisi' }} /
                        {{ $dataPendaftaran->no_pkh ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">6</td>
                    <td>NIK Siswa</td>
                    <td>{{ $dataPendaftaran->nik ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">7</td>
                    <td>No. Akte Kelahiran</td>
                    <td>{{ $dataPendaftaran->no_akte_kelahiran ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">8</td>
                    <td>Sekolah Asal (TK)</td>
                    <td>{{ ucfirst(Str::title($dataPendaftaran->asal_sekolah)) ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">9</td>
                    <td>Agama</td>
                    <td>{{ ucfirst(Str::title($dataPendaftaran->agama)) ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">10</td>
                    <td>Alamat Lengkap Tempat Tinggal</td>
                    <td>{{ ucfirst(Str::title($dataPendaftaran->alamat)) ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">11</td>
                    <td>Tinggal Dengan</td>
                    <td>{{ ucfirst(Str::title($dataPendaftaran->tinggal_dengan)) ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">11</td>
                    <td>No. Handphone Aktif</td>
                    <td>{{ $dataPendaftaran->no_telp ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">12</td>
                    <td>Anak Ke</td>
                    <td>{{ $dataPendaftaran->anak_ke ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">13</td>
                    <td>Jumlah Saudara Kandung</td>
                    <td>{{ $dataPendaftaran->jml_saudara_kandung ?? '' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">14</td>
                    <td>Tinggi dan Berat Badan</td>
                    <td>{{ $dataPendaftaran->tinggi_badan ?? '' }} cm / {{ $dataPendaftaran->berat_badan ?? '' }} kg
                    </td>
                </tr>
                <tr>
                    <th colspan="3" class="bg-light">B. IDENTITAS ORANG TUA</th>
                </tr>
                <!-- Data Orang Tua -->
                <tr>
                    <td></td>
                    <th colspan="3" class="bg-light">Data Ayah Kandung</th>
                </tr>
                <tr>
                    <td class="font-weight-bold">1</td>
                    <td>Nama Ayah</td>
                    <td scope="col" class="w-75"> {{ ucfirst(Str::title($dataOrtu->nama_ayah ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">2</td>
                    <td>Tempat Tanggal Lahir Ayah</td>
                    <td>{{ Ucfirst(Str::title($dataOrtu->tempat_lahir_ayah ?? '')) }},
                        {{ date('d-m-Y', strtotime($dataOrtu->tanggal_lahir_ayah)) ?? '' }}

                        {{-- {{ $dataOrtu->tanggal_lahir_ayah ?? '' }}</td> --}}
                        {{-- <td> {{ ucfirst(Str::title($dataOrtu->tempat_lahir_tanggal_lahir_ayah ?? '')) }}</td> --}}
                </tr>
                <tr>
                    <td class="font-weight-bold">3</td>
                    <td>NIK Ayah</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->nik_ayah ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">4</td>
                    <td>Pendidikan Terakhir Ayah</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->pendidikan_ayah ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">5</td>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->pekerjaan_ayah ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">6</td>
                    <td>Alamat Ayah</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->alamat_ayah ?? '')) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th colspan="3" class="bg-light">Data Ibu Kandung</th>
                </tr>
                <tr>
                    <td class="font-weight-bold">1</td>
                    <td>Nama Ibu</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->nama_ibu ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">2</td>
                    <td>Tempat Tanggal Lahir Ibu</td>
                    <td>{{ Ucfirst(Str::title($dataOrtu->tempat_lahir_ibu ?? '')) }},
                        {{ date('d-m-Y', strtotime($dataOrtu->tanggal_lahir_ibu)) ?? '' }}
                    </td>
                    {{-- <td>{{ ucfirst(Str::title($dataOrtu->tempat_lahir_tanggal_lahir_ibu ?? '')) }}</td> --}}
                </tr>
                <tr>
                    <td class="font-weight-bold">3</td>
                    <td>NIK Ibu</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->nik_ibu ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">4</td>
                    <td>Pendidikan Terakhir Ibu</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->pendidikan_ibu ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">5</td>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->pekerjaan_ibu ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">6</td>
                    <td>Alamat Ibu</td>
                    <td>{{ ucfirst(Str::title($dataOrtu->alamat_ibu ?? '')) }}</td>
                </tr>

                <!-- Data Wali -->
                <tr>
                    <th colspan="3" class="bg-light">C. IDENTITAS WALI</th>
                </tr>
                <tr>
                    <td class="font-weight-bold">1</td>
                    <td>Nama Wali</td>
                    <td scope="col" class="w-75">{{ ucfirst(Str::title($dataWali->nama_wali ?? '')) }}</td>
                </tr>

                <tr>
                    <td class="font-weight-bold">2</td>
                    <td>Tahun Lahir</td>
                    <td>{{ ucfirst(Str::title($dataWali->tahun_lahir ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">3</td>
                    <td>Pendidikan</td>
                    <td>{{ ucfirst(Str::title($dataWali->pendidikan ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">4</td>
                    <td>Pekerjaan</td>
                    <td>{{ ucfirst(Str::title($dataWali->pekerjaan ?? '')) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">5</td>
                    <td>Alamat</td>
                    <td>{{ ucfirst(Str::title($dataWali->alamat ?? '')) }}</td>
                </tr>

                <tr>
                    <th colspan="3" class="bg-light">Status Penerimaan</th>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <span
                            class="m-2 badge 
                            {{ $dataPendaftaran->status == 'verifikasi'
                                ? 'bg-warning'
                                : ($dataPendaftaran->status == 'diterima'
                                    ? 'bg-success'
                                    : ($dataPendaftaran->status == 'ditolak'
                                        ? 'bg-danger'
                                        : 'bg-secondary')) }}">
                            <h6>{{ ucfirst(Str::lower($dataPendaftaran->status ?? '')) }}</h6>
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>

        <!-- Tanda tangan -->
        <div class="col-10 align-item-center justify-content-center">
            <div class="d-flex justify-content-between">
                <div class="text-left">
                    <p>Mengetahui, <br>Ka. SDN 18 Dewantara</p>
                    <div style="height: 60px;"></div>
                    <p class="font-weight-bold">{{ $kepsek->name }}</p>
                    <p>NIP : .......................................</p>
                </div>

                <div class="text-left">
                    <p>Madat, {{ strftime('%d %B %Y') }}<br>Orang Tua / Wali</p>
                    <div style="height: 60px;"></div>
                    {{-- <p class="font-weight-bold">{{ $kepsek->name }}</p> --}}
                    <p>................................................</p>
                </div>


            </div>
        </div>


    </div>

    {{-- <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 SD Negeri 18 Dewantara</p>
    </div> --}}

    <script>
        // Membuka halaman print
        window.onload = function() {
            window.print();
        };
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>


{{-- 
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru</title>

    <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
        }

        .header p {
            margin: 5px 0;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 2px;
            text-align: left;
            vertical-align: top;
        }

        .section-title {
            font-weight: bold;
            background-color: #f0f0f0;
        }

        .status {
            text-align: center;
            color: red;
        }

        .section {
            counter-reset: rowNumber;
        }

        .section .row-number:before {
            counter-increment: rowNumber;
            content: counter(rowNumber) ". ";
        }

        /* reset nomor */
        .section:not(:first-of-type) {
            margin-top: 20px;
        }

        /* Lebar Kolom */
        .section td:first-child {
            width: 5%;
        }

        .section td:nth-child(2) {
            width: 35%;
        }

        .section td:last-child {
            width: 60%;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah">
        <h1>FORMULIR PENDAFTARAN SISWA BARU</h1>
        <p>SD NEGERI 18 DEWANTARA</p>
        <p>Dusun Madat Gampong Paloh Lada Kecamatan Dewantara Kabupaten Aceh Utara 24354</p>
        <p>Email: sdnegeri18dwtbgmail.com</p>
        <hr width="80%" class="text-center" />

    </div>

    <table class="section">
        <tr>
            <th colspan="3" class="section-title">A. IDENTITAS CALON SISWA</th>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Nama Lengkap Calon Siswa</td>
            <td>{{ $dataPendaftaran->name ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Jenis Kelamin</td>
            <td>{{ $dataPendaftaran->jenis_kelamin ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Tempat Tanggal Lahir</td>
            <td>{{ $dataPendaftaran->tempat_lahir ?? '' }}, {{ $dataPendaftaran->tanggal_lahir ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>No. KK</td>
            <td>{{ $dataPendaftaran->kk ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Penerima PKH / No. Kartu PKH</td>
            <td>{{ ucfirst($dataPendaftaran->status_pkh) ?? 'Data Belum Diisi' }} /
                {{ $dataPendaftaran->no_pkh ?? '-' }}
            </td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>NIK Siswa</td>
            <td>{{ $dataPendaftaran->nik ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>No. Akte Kelahiran</td>
            <td>{{ $dataPendaftaran->no_akte_kelahiran ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Sekolah Asal (TK)</td>
            <td>{{ $dataPendaftaran->asal_sekolah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Agama</td>
            <td>{{ $dataPendaftaran->agama ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Alamat Lengkap Tempat Tinggal</td>
            <td>{{ $dataPendaftaran->alamat ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Tinggal Dengan</td>
            <td>{{ $dataPendaftaran->tinggal_dengan ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Anak Ke</td>
            <td>{{ $dataPendaftaran->anak_ke ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Jumlah Saudara Kandung</td>
            <td>{{ $dataPendaftaran->jml_saudara_kandung ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Tinggi dan Berat Badan</td>
            <td>{{ $dataPendaftaran->tinggi_badan ?? '' }} cm / {{ $dataPendaftaran->berat_badan ?? '' }} kg</td>
        </tr>

        <tr>
            <th colspan="3" class="section-title">B. IDENTITAS ORANG TUA</th>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Nama Ayah</td>
            <td>{{ $dataOrtu->nama_ayah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Tempat Tanggal Lahir Ayah</td>
            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ayah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>NIK Ayah</td>
            <td>{{ $dataOrtu->nik_ayah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Nama Ibu</td>
            <td>{{ $dataOrtu->nama_ibu ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Tempat Tanggal Lahir Ibu</td>
            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ibu ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>NIK Ibu</td>
            <td>{{ $dataOrtu->nik_ibu ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Alamat Ayah</td>
            <td>{{ $dataOrtu->alamat_ayah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Alamat Ibu</td>
            <td>{{ $dataOrtu->alamat_ibu ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Pekerjaan Ayah</td>
            <td>{{ $dataOrtu->pekerjaan_ayah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Pekerjaan Ibu</td>
            <td>{{ $dataOrtu->pekerjaan_ibu ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Pendidikan Terakhir Ayah</td>
            <td>{{ $dataOrtu->pendidikan_ayah ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Pendidikan Terakhir Ibu</td>
            <td>{{ $dataOrtu->pendidikan_ibu ?? '' }}</td>
        </tr>

        <tr>
            <th colspan="3" class="section-title">C. IDENTITAS WALI</th>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Nama Wali</td>
            <td>{{ $dataWali->nama_wali ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Tahun Lahir</td>
            <td>{{ $dataWali->tahun_lahir ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Pendidikan</td>
            <td>{{ $dataWali->pendidikan ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Pekerjaan</td>
            <td>{{ $dataWali->pekerjaan ?? '' }}</td>
        </tr>
        <tr>
            <td class="row-number"></td>
            <td>Alamat</td>
            <td>{{ $dataWali->alamat ?? '' }}</td>
        </tr>

        <tr>
            <th colspan="3" class="section-title">Status Penerimaan</th>
        </tr>
        <tr>
            <td colspan="3" class="text-center">{{ $dataPendaftaran->status ?? '' }}</td>
        </tr>

    </table>

    <div class="text-right">
        <p class="font-weight-bold">Hormat Kami</p>
        <div style="height: 60px;"></div>
        <p class="font-weight-bold">{{ $kepsek->name }}</p>
        <p>NIP .......................................</p>
    </div>

    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html> --}}
