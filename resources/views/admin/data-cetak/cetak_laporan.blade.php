<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penerimaan Siswa</title>

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
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
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
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah">
        <h1>LAPORAN PENERIMAAN SISWA</h1>
        <p>SD NEGERI 18 DEWANTARA</p>
        <p>Dusun Madat Gampong Paloh Lada Kecamatan Dewantara Kabupaten Aceh Utara 24354</p>
        <p>Email: sdnegeri18dwtbgmail.com</p>
        <p>----------------------------</p>
    </div>

    <table class="section" style="margin-top: 40px;">
        <tr>
            <th>Peserta Diterima</th>
            <th>Peserta Ditolak</th>
            <th>Peserta Belum Melengkapi Data</th>
        </tr>
        <tr>
            <td>{{ $totalPesertaDiterima }}</td>
            <td>{{ $totalPesertaDitolak }}</td>
            <td>{{ $totalPesertaBelumMelengkapiData }}</td>
        </tr>
    </table>


    <table class="section">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Nama Wali</th>
            <th>No. Telp Wali</th>
            <th>Status Pendaftaran</th>
        </tr>
        @foreach ($dataPendaftaran as $pendaftaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pendaftaran->name ?? '' }}</td>
                <td>{{ ucfirst($pendaftaran->jenis_kelamin) ?? '' }}</td>
                <td>{{ $pendaftaran->ortu->nama_ayah ?? '' }}</td>
                <td>{{ $pendaftaran->ortu->nama_ibu ?? '' }}</td>
                <td>{{ $pendaftaran->wali->nama_wali ?? '' }}</td>
                <td>{{ $pendaftaran->wali->no_telp ?? '' }}</td>
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
                        if (!empty($dataBelumLengkap)) {
                            $status = 'Belum melengkapi data ' . implode(', ', $dataBelumLengkap);
                        } else {
                            $status = ucfirst($pendaftaran->status);
                        }
                    @endphp
                    {{ $status }}
                </td>
            </tr>
        @endforeach
    </table>



    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
