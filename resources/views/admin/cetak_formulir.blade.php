<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #000;
            text-align: left;
        }

        h4 {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">FORMULIR PENDAFTARAN SISWA BARU</h2>
    <h3 style="text-align: center;">SD NEGERI 18 DEWANTARA</h3>

    <h4>A. Identitas Calon Siswa</h4>
    <table>
        <tr>
            <th>Nama Lengkap Calon Siswa</th>
            <td>{{ $dataPendaftaran->nama_siswa ?? '' }}</td>
        </tr>
        <!-- Add all other fields similarly -->
    </table>

    <h4>B. Identitas Orang Tua</h4>
    <table>
        <tr>
            <th>Nama Ayah Kandung</th>
            <td>{{ $dataOrtu->nama_ayah ?? '' }}</td>
        </tr>
        <!-- Add all other fields similarly -->
    </table>

    <h4>C. Identitas Wali</h4>
    <table>
        <tr>
            <th>Nama Wali</th>
            <td>{{ $dataWali->nama_wali ?? '' }}</td>
        </tr>
        <!-- Add all other fields similarly -->
    </table>

    <h4>D. Persyaratan Pendaftaran yang Dibawa</h4>
    <table>
        <tr>
            <th>Foto Copy Akta Kelahiran</th>
            <td></td>
        </tr>
        <!-- Add the required fields as shown in the image -->
    </table>

    <p><b>Note:</b> SEMUA BAHAN DIMASUKAN DALAM MAP PLASTIK</p>
</body>

</html>
