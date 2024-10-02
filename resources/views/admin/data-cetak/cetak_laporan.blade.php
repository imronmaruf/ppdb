<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penerimaan Siswa</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
        }

        /* Mengurangi padding pada tabel untuk membuatnya lebih rapat */
        table th,
        table td {
            padding: 4px !important;
        }

        /* Menambah margin bawah untuk cetak */
        @media print {
            @page {
                size: A4 landscape;
                /* Mengatur orientasi kertas menjadi landscape */
                margin: 1cm 1cm 4cm 1cm;
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
            background-color: black;
            width: 100%;
        }

        .thin-hr {
            border: 0;
            height: 2px;
            background-color: black;
            width: 96%;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom pertama untuk logo -->
            <div class="col-2 text-left">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah" class="img-fluid" width="100">
            </div>

            <!-- Kolom kedua untuk teks yang berada di tengah -->
            <div class="col-8 text-center">
                <h2 class="mb-0">LAPORAN PENERIMAAN SISWA</h2>
                <p class="mb-0">SD NEGERI 18 DEWANTARA</p>
                <p class="mb-0">Dusun Madat Gampong Paloh Lada Kecamatan Dewantara Kabupaten Aceh Utara 24354</p>
                <p class="mb-0">Email : {{ $email }}</p>
            </div>
            <!-- Kolom ketiga untuk ruang kosong -->
            <div class="col-2"></div>
        </div>

        <hr class="thick-hr mt-3">
        <div class="container mt-4">
            <!-- Tabel Data Pendaftaran -->
            <p class="mb-0"> <strong>Tahun: {{ request('tahun') ?? 'Semua Tahun' }}</strong></p>
            <p><strong>Status: {{ request('status') ? ucfirst(request('status')) : 'Semua Status' }}</strong></p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Peserta Belum di Verifikasi</th>
                        <th>Peserta Diterima</th>
                        <th>Peserta Ditolak</th>
                        <th>Peserta Belum Melengkapi Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $totalPesertaVerifikasi }}</td>
                        <td>{{ $totalPesertaDiterima }}</td>
                        <td>{{ $totalPesertaDitolak }}</td>
                        <td>{{ $totalPesertaBelumMelengkapiData }}</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Hp</th>
                        <th>Nama Ayah</th>
                        <th>Nama Ibu</th>
                        <th>Nama Wali</th>
                        <th>Tahun</th>
                        <th>Status Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPendaftaran as $pendaftaran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftaran->name ?? '' }}</td>
                            <td>{{ ucfirst($pendaftaran->jenis_kelamin) ?? '' }}</td>
                            <td>{{ $pendaftaran->no_telp ?? '' }}</td>
                            <td>{{ $pendaftaran->ortu->nama_ayah ?? '' }}</td>
                            <td>{{ $pendaftaran->ortu->nama_ibu ?? '' }}</td>
                            <td>{{ $pendaftaran->wali->nama_wali ?? '' }}</td>
                            <td>{{ $pendaftaran->created_at ? $pendaftaran->created_at->format('Y') : '' }}</td>

                            <td>
                                @php
                                    $dataBelumLengkap = [];
                                    if (!$pendaftaran->ortu) {
                                        $dataBelumLengkap[] = 'ortu';
                                    }
                                    if (!$pendaftaran->wali) {
                                        $dataBelumLengkap[] = 'wali';
                                    }
                                    if (!$pendaftaran->berkas) {
                                        $dataBelumLengkap[] = 'berkas';
                                    }
                                    $status = !empty($dataBelumLengkap)
                                        ? 'Belum melengkapi data ' . implode(', ', $dataBelumLengkap)
                                        : ucfirst($pendaftaran->status);
                                @endphp
                                {{ $status }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Tanda tangan -->
            <div class="text-right">
                <p>Mengetahui, <br>Ka SDN 18 Dewantara</p>
                <div style="height: 60px;"></div>
                <p class="font-weight-bold">{{ $kepsek->name }}</p>
                <p>NIP .......................................</p>
            </div>
        </div>

        <script>
            window.onload = function() {
                window.print();
            };
        </script>

</body>

</html>
