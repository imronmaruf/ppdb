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
        {{-- <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah"> --}}
        <h1>FORMULIR PENDAFTARAN SISWA BARU</h1>
        <p>SD NEGERI 18 DEWANTARA</p>
        <p>Dusun Madat Gampong Paloh Lada Kecamatan Dewantara Kabupaten Aceh Utara 24354</p>
        <p>Email: sdnegeri18dwtbgmail.com</p>
        <hr width="80%" />

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

    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
