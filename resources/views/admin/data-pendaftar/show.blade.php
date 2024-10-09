@extends('admin.layouts.main')

@push('title')
    Detail Peserta
@endpush

@push('css')
    <style>
        .pdf-viewer {
            width: 100%;
            height: 300px;
            /* Sesuaikan tinggi iframe sesuai kebutuhan Anda */
            border: 1px solid #ccc;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a type="button" class="btn btn-secondary" href="{{ route('data-pendaftar.index') }}">
                            <i class="mdi mdi-arrow-left me-2"></i> <span>Kembali</span>
                        </a>
                    </div>
                    <h4 class="page-title">Detail Peserta</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="header-title">Data Lengkap Calon Siswa</h4>

                        @if (!empty($dataPendaftar->berkas) && !empty($dataPendaftar->berkas->pas_foto))
                            <img src="{{ asset($dataPendaftar->berkas->pas_foto) }}" alt="foto {{ $dataPendaftar->name }}"
                                class="img-fluid" style="max-width: 150px; border-radius: 5%;">
                        @endif

                    </div>

                    <h4 class="header-title">A. Identitas Calon Siswa</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped">
                                    <tbody>
                                        <!-- Data Siswa -->
                                        @if (!$dataPendaftar)
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <span class="badge bg-warning">Belum mengisi data siswa</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row" class="w-25">Nama Lengkap Calon Siswa</th>
                                                <td class="w-75">{{ $dataPendaftar->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Jenis Kelamin</th>
                                                <td class="w-75">{{ $dataPendaftar->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Tempat, Tanggal Lahir</th>
                                                <td class="w-75">{{ $dataPendaftar->tempat_lahir }},
                                                    {{ $dataPendaftar->tanggal_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">No. KK</th>
                                                <td class="w-75">{{ $dataPendaftar->kk }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Penerima PKH / No. Kartu PKH</th>
                                                <td>{{ ucfirst($dataPendaftar->status_pkh) ?? 'Data Belum Diisi' }} /
                                                    {{ $dataPendaftar->no_pkh ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">NIK Siswa</th>
                                                <td class="w-75">{{ $dataPendaftar->nik }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">No. Akte Kelahiran</th>
                                                <td class="w-75">{{ $dataPendaftar->no_akte_kelahiran }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Sekolah Asal (TK)</th>
                                                <td class="w-75">{{ $dataPendaftar->asal_sekolah }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Agama</th>
                                                <td class="w-75">{{ $dataPendaftar->agama }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Alamat Lengkap Tempat Tinggal</th>
                                                <td class="w-75">{{ $dataPendaftar->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Tinggal Dengan</th>
                                                <td class="w-75">{{ $dataPendaftar->tinggal_dengan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">No. Handphone Aktif</th>
                                                <td class="w-75">{{ $dataPendaftar->no_telp ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Anak Ke</th>
                                                <td class="w-75">{{ $dataPendaftar->anak_ke }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Jumlah Saudara Kandung</th>
                                                <td class="w-75">{{ $dataPendaftar->jml_saudara_kandung }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Tinggi dan Berat Badan</th>
                                                <td class="w-75">{{ $dataPendaftar->tinggi_badan }} cm /
                                                    {{ $dataPendaftar->berat_badan }} kg</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <!-- Identitas Orang Tua -->
                    <h4 class="header-title mt-3">B. Identitas Orang Tua</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped">
                                    <tbody>
                                        @if (!$dataPendaftar->ortu)
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <span class="badge bg-warning">Belum mengisi data orang tua</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row" class="w-25">Nama Ayah</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->nama_ayah ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Tempat Tanggal Lahir Ayah</th>
                                                <td class="w-75">
                                                    {{ $dataPendaftar->ortu->tempat_lahir_ayah ?? '-' }},
                                                    {{ $dataPendaftar->ortu->tanggal_lahir_ayah ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Pendidikan Terakhir Ayah</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->pendidikan_ayah ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Pekerjaan Ayah</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->pekerjaan_ayah ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Nama Ibu</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->nama_ibu ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Tempat Tanggal Lahir Ibu</th>
                                                <td class="w-75">
                                                    {{ $dataPendaftar->ortu->tempat_lahir_ibu ?? '-' }},
                                                    {{ $dataPendaftar->ortu->tanggal_lahir_ibu ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Pendidikan Terakhir Ibu</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->pendidikan_ibu ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Pekerjaan Ibu</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->pekerjaan_ibu ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Alamat Ayah</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->alamat_ayah ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Alamat Ibu</th>
                                                <td class="w-75">{{ $dataPendaftar->ortu->alamat_ibu ?? '-' }}</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <!-- Identitas Wali -->
                    <h4 class="header-title mt-3">C. Identitas Wali</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped">
                                    <tbody>
                                        @if (!$dataPendaftar->wali)
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <span class="badge bg-warning">Belum mengisi data wali</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row" class="w-25">Nama Wali</th>
                                                <td class="w-75">{{ $dataPendaftar->wali->nama_wali ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Tahun Lahir Wali</th>
                                                <td class="w-75">{{ $dataPendaftar->wali->tahun_lahir ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Pendidikan Terakhir Wali</th>
                                                <td class="w-75">{{ $dataPendaftar->wali->pendidikan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Pekerjaan Wali</th>
                                                <td class="w-75">{{ $dataPendaftar->wali->pekerjaan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="w-25">Alamat Wali</th>
                                                <td class="w-75">{{ $dataPendaftar->wali->alamat ?? '-' }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <!-- Identitas Wali -->
                    <h4 class="header-title mt-3">D. Berkas Peserta</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped">
                                    <tbody>
                                        @if (!$dataPendaftar->berkas)
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <span class="badge bg-warning">Belum Upload Berkas</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="col">Akte Kelahiran</th>
                                                <td>
                                                    @if ($dataPendaftar && $dataPendaftar->berkas->akte_kelahiran)
                                                        <a href="{{ asset($dataPendaftar->berkas->akte_kelahiran) }}"
                                                            download="{{ $dataPendaftar->berkas->akte_kelahiran }}"
                                                            target="_blank">
                                                            <span
                                                                class="text-primary text-decoration-underline">Download</span>
                                                        </a>
                                                        <br>
                                                        <iframe src="{{ asset($dataPendaftar->berkas->akte_kelahiran) }}"
                                                            class="pdf-viewer mt-2" frameborder="0">
                                                            Your browser does not support PDFs.
                                                            <a href="{{ asset($dataPendaftar->berkas->akte_kelahiran) }}">Download
                                                                the PDF</a>
                                                        </iframe>
                                                    @else
                                                        <span class="badge bg-danger">Belum Upload</span>
                                                    @endif

                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Kartu Keluarga</th>
                                                <td>
                                                    @if ($dataPendaftar && $dataPendaftar->berkas->kk)
                                                        <a href="{{ asset($dataPendaftar->berkas->kk) }}"
                                                            download="{{ $dataPendaftar->berkas->kk }}" target="_blank">
                                                            <span
                                                                class="text-primary text-decoration-underline">Download</span>
                                                        </a>
                                                        <br>
                                                        <iframe src="{{ asset($dataPendaftar->berkas->kk) }}"
                                                            class="pdf-viewer mt-2" frameborder="0">
                                                            Your browser does not support PDFs.
                                                            <a href="{{ asset($dataPendaftar->berkas->kk) }}">Download
                                                                the PDF</a>
                                                        </iframe>
                                                    @else
                                                        <span class="badge bg-danger">Belum Upload</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">KTP Orang Tua</th>
                                                <td>
                                                    @if ($dataPendaftar && $dataPendaftar->berkas->ktp_ortu)
                                                        <a href="{{ asset($dataPendaftar->berkas->ktp_ortu) }}"
                                                            download="{{ $dataPendaftar->berkas->ktp_ortu }}"
                                                            target="_blank">
                                                            <span
                                                                class="text-primary text-decoration-underline">Download</span>
                                                        </a>
                                                        <br>
                                                        <iframe src="{{ asset($dataPendaftar->berkas->ktp_ortu) }}"
                                                            class="pdf-viewer mt-2" frameborder="0">
                                                            Your browser does not support PDFs.
                                                            <a href="{{ asset($dataPendaftar->berkas->ktp_ortu) }}">Download
                                                                the PDF</a>
                                                        </iframe>
                                                    @else
                                                        <span class="badge bg-danger">Belum Upload</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Ijazah TK</th>
                                                <td>
                                                    @if ($dataPendaftar->berkas && $dataPendaftar->berkas->ijazah)
                                                        <a href="{{ asset($dataPendaftar->berkas->ijazah) }}"
                                                            download="{{ $dataPendaftar->berkas->ijazah }}"
                                                            target="_blank">
                                                            <span
                                                                class="text-primary text-decoration-underline">Download</span>
                                                        </a>
                                                        <br>
                                                        <iframe src="{{ asset($dataPendaftar->berkas->ijazah) }}"
                                                            class="pdf-viewer mt-2" frameborder="0">
                                                            Your browser does not support PDFs.
                                                            <a href="{{ asset($dataPendaftar->berkas->ijazah) }}">Download
                                                                the PDF</a>
                                                        </iframe>
                                                    @else
                                                        <span>-</span>
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Kartu PKH</th>
                                                <td>
                                                    @if ($dataPendaftar->berkas && $dataPendaftar->berkas->ijazah)
                                                        <a href="{{ asset($dataPendaftar->berkas->kartu_pkh) }}"
                                                            download="{{ $dataPendaftar->berkas->kartu_pkh }}"
                                                            target="_blank">
                                                            <span
                                                                class="text-primary text-decoration-underline">Download</span>
                                                        </a>
                                                        <br>
                                                        <iframe src="{{ asset($dataPendaftar->berkas->kartu_pkh) }}"
                                                            class="pdf-viewer mt-2" frameborder="0">
                                                            Your browser does not support PDFs.
                                                            <a href="{{ asset($dataPendaftar->berkas->kartu_pkh) }}">Download
                                                                the PDF</a>
                                                        </iframe>
                                                    @else
                                                        <span class="badge bg-danger">Tidak ada</span>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div>


                    <h4 class="header-title mt-3">Verifikasi Berkas & Status Penerimaan Siswa</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table mb-0 table-bordered table-striped">
                                <tr>
                                    <th scope="col">Status Penerimaan Siswa</th>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form method="POST"
                                                action="{{ route('data-pendaftar.update-status', $dataPendaftar->id) }}">
                                                @csrf
                                                <input type="hidden" name="status" value="diterima">
                                                <button type="submit" class="btn btn-success"
                                                    {{ $dataPendaftar->status === 'diterima' || $dataPendaftar->status === 'ditolak' ? 'disabled' : '' }}>
                                                    Terima
                                                </button>
                                            </form>
                                            <form method="POST"
                                                action="{{ route('data-pendaftar.update-status', $dataPendaftar->id) }}">
                                                @csrf
                                                <input type="hidden" name="status" value="ditolak">
                                                <button type="submit" class="btn btn-danger"
                                                    {{ $dataPendaftar->status === 'diterima' || $dataPendaftar->status === 'ditolak' ? 'disabled' : '' }}>
                                                    Tolak
                                                </button>
                                            </form>

                                        </div>
                                    </td>


                                </tr>
                            </table>
                        </div>
                    </div>

                    <a type="button" class="btn btn-secondary mt-3" href="{{ route('data-pendaftar.index') }}">
                        <i class="mdi mdi-arrow-left me-2"></i> <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>

    </div> <!-- end container-fluid -->
@endsection

@push('js')
    <script>
        let successMessage = '{{ session('success') }}';
        if (successMessage !== '') {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: successMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endpush
