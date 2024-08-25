@extends('admin.layouts.main')

@push('title')
    Dashboard {{ Auth::user()->role ?? '' }}
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard {{ Auth::user()->role }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @can('siswa-only')
                <!-- Start: Welcome Card -->
                <div class="col-12 col-xl-6 mb-3 mb-xl-2">
                    <div class="card cta-box bg-primary text-white h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="w-100 overflow-hidden">
                                    <h3 class="m-0 fw-normal cta-box-title">Selamat datang <b>{{ Auth::user()->name }}</b> di
                                        Website PPDB Online SD N 18 Dewantara
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div>
                <!-- End: Welcome Card -->

                <!-- Start: Status Card -->
                <div class="col-12 col-xl-6 mb-3 mb-xl-2">
                    @php
                        // Determine status class and message based on registration status
                        $statusClass = 'secondary';
                        $statusMessage = 'Data tidak tersedia';
                        if ($dataPendaftaran) {
                            $statusClass = match ($dataPendaftaran->status) {
                                'verifikasi' => 'warning',
                                'diterima' => 'success',
                                'ditolak' => 'danger',
                                default => 'secondary',
                            };
                            $statusMessage = match ($dataPendaftaran->status) {
                                'verifikasi' => 'Harap menunggu, formulir anda sedang diverifikasi',
                                'diterima' => 'Selamat!!, Kamu diterima',
                                'ditolak' => 'Mohon Maaf, anda belum diterima',
                                default => 'Data tidak tersedia',
                            };
                        }
                    @endphp

                    <div class="card cta-box bg-{{ $statusClass }} text-white h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="w-100 overflow-hidden">
                                    <h2 class="mt-0">
                                        <i class="mdi mdi-bullhorn-outline"></i>
                                    </h2>
                                    <h3 class="m-0 fw-normal cta-box-title">{{ $statusMessage }} </h3>
                                </div>
                                <img class="ms-3" src="{{ asset('admin/assets/images/email-campaign.svg') }}" width="120"
                                    alt="Generic placeholder image">
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div>
                <!-- End: Status Card -->

                <!-- Start: Formulir Process Card -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-2">Alur Pengisian Formulir</h4>
                            <div data-simplebar style="max-height: 330px;">
                                <div class="timeline-alt pb-0">
                                    <div class="timeline-item">
                                        <i class="mdi mdi-18px mdi-numeric-1 bg-info-lighten text-info timeline-icon"></i>
                                        <div class="timeline-item-info">
                                            <a href="" class="text-info fw-bold mb-1 d-block">Mengisi
                                                Formulir Calon Siswa</a>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <i class="mdi mdi-18px mdi-numeric-2 bg-primary-lighten text-primary timeline-icon"></i>
                                        <div class="timeline-item-info">
                                            <a href="" class="text-primary fw-bold mb-1 d-block">Mengisi
                                                Formulir Identitas Orang Tua</a>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <i class="mdi mdi-18px mdi-numeric-3 bg-success-lighten text-success timeline-icon"></i>
                                        <div class="timeline-item-info">
                                            <a href="" class="text-success fw-bold mb-1 d-block">Mengisi
                                                Formulir Identitas Wali</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- end timeline -->
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div>
                <!-- End: Formulir Process Card -->

                <!-- Start: Formulir Data Display Card -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-3">
                                <h4 class="header-title">Data Formulir Calon Siswa</h4>
                                <div>
                                    <!-- Tombol Cetak Hasil Formulir -->
                                    <a href="{{ route('admin.cetakFormulir') }}" class="btn btn-info">
                                        <i class="mdi mdi-printer me-2"></i> <span>Cetak Hasil Formulir</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Identitas Calon Siswa -->
                            <h4 class="header-title">A. Identitas Calon Siswa</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Lengkap Calon Siswa</th>
                                            <td>{{ $dataPendaftaran->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Jenis Kelamin</th>
                                            <td>{{ $dataPendaftaran->jenis_kelamin ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir</th>
                                            <td>{{ $dataPendaftaran->tempat_lahir ?? '' }},
                                                {{ $dataPendaftaran->tanggal_lahir ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">No. KK</th>
                                            <td>{{ $dataPendaftaran->kk ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">NIK Siswa</th>
                                            <td>{{ $dataPendaftaran->nik ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">No. Akte Kelahiran</th>
                                            <td>{{ $dataPendaftaran->no_akte_kelahiran ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Sekolah Asal (TK)</th>
                                            <td>{{ $dataPendaftaran->asal_sekolah ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Agama</th>
                                            <td>{{ $dataPendaftaran->agama ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Lengkap Tempat Tinggal</th>
                                            <td>{{ $dataPendaftaran->alamat ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tinggal Dengan</th>
                                            <td>{{ $dataPendaftaran->tinggal_dengan ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Anak Ke</th>
                                            <td>{{ $dataPendaftaran->anak_ke ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Jumlah Saudara Kandung</th>
                                            <td>{{ $dataPendaftaran->jml_saudara_kandung ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tinggi dan Berat Badan</th>
                                            <td>{{ $dataPendaftaran->tinggi_badan ?? '' }} cm /
                                                {{ $dataPendaftaran->berat_badan ?? '' }} kg</td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>

                            <!-- Identitas Orang Tua -->
                            <h4 class="header-title mt-3">B. Identitas Orang Tua</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Ayah</th>
                                            <td>{{ $dataOrtu->nama_ayah ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir Ayah</th>
                                            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ayah ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pendidikan Terakhir Ayah</th>
                                            <td>{{ $dataOrtu->pendidikan_ayah ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pekerjaan Ayah</th>
                                            <td>{{ $dataOrtu->pekerjaan_ayah ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Nama Ibu</th>
                                            <td>{{ $dataOrtu->nama_ibu ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir Ibu</th>
                                            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ibu ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pendidikan Terakhir Ibu</th>
                                            <td>{{ $dataOrtu->pendidikan_ibu ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pekerjaan Ibu</th>
                                            <td>{{ $dataOrtu->pekerjaan_ibu ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Ayah</th>
                                            <td>{{ $dataOrtu->alamat_ayah ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Ibu</th>
                                            <td>{{ $dataOrtu->alamat_ibu ?? '' }}</td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>

                            <!-- Identitas Wali -->
                            <h4 class="header-title mt-3">C. Identitas Wali</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Wali</th>
                                            <td>{{ $dataWali->nama_wali ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir Wali</th>
                                            <td>{{ $dataWali->tahun_lahir ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pendidikan Terakhir Wali</th>
                                            <td>{{ $dataWali->pendidikan ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pekerjaan Wali</th>
                                            <td>{{ $dataWali->pekerjaan ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Wali</th>
                                            <td>{{ $dataWali->alamat ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">No. HP Wali</th>
                                            <td>{{ $dataWali->no_telp ?? '' }}</td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
                <!-- End: Formulir Data Display Card -->
            @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-2">Selamat Datang di Dashboard Admin!</h4>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
