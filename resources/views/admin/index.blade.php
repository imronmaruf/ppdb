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
                        <div class="card-body d-flex justify-content-center align-items-center h-100">
                            <div class="d-flex align-items-center">
                                <div class="w-100 overflow-hidden">
                                    <h3 class="m-0 fw-normal cta-box-title">Selamat datang <b>{{ Auth::user()->name }}</b> di
                                        Website PPDB Online SD N 18 Dewantara
                                        <br>Anda masuk sebagai <b>{{ Auth::user()->role }}</b>
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
                        $statusClass = 'secondary';
                        $statusMessage = 'Belum Mengisi Formulir';
                        $isComplete = empty($dataBelumLengkap);

                        if ($isComplete && $dataPendaftaran) {
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
                        } elseif (!$isComplete) {
                            $statusMessage =
                                'Data belum lengkap harap melengkapi data: ' . implode(', ', $dataBelumLengkap);
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
                                <a href="{{ route('admin.cetakFormulir') }}" type="button" class="btn btn-info"><i
                                        class="mdi mdi-printer me-1"></i> <span>Cetak
                                        Hasil Formulir</span> </a>

                            </div>


                            @if (empty($dataPendaftaran) && empty($dataOrtu) && empty($dataWali))
                                <!-- Jika data kosong, tampilkan tabel dengan badge -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <span class="badge bg-warning text-dark">Belum Melengkapi Formulir</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <!-- Identitas Calon Siswa -->
                                <h4 class="header-title">A. Identitas Calon Siswa</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped">
                                                <tbody>
                                                    @if ($dataPendaftaran)
                                                        <tr>
                                                            <th scope="col" class="w-25">Nama Lengkap Calon Siswa</th>
                                                            <td>{{ $dataPendaftaran->name ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Jenis Kelamin</th>
                                                            <td>{{ ucfirst($dataPendaftaran->jenis_kelamin) ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tempat Tanggal Lahir</th>
                                                            <td>{{ $dataPendaftaran->tempat_lahir ?? '' }},
                                                                {{ $dataPendaftaran->tanggal_lahir ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">No. KK</th>
                                                            <td>{{ $dataPendaftaran->kk ?? '' }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="col">Penerima PKH / No. Kartu PKH</th>
                                                            <td>{{ ucfirst($dataPendaftaran->status_pkh) ?? 'Data Belum Diisi' }}
                                                                /
                                                                {{ $dataPendaftaran->no_pkh ?? '-' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">NIK Siswa</th>
                                                            <td>{{ $dataPendaftaran->nik ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">No. Akte Kelahiran</th>
                                                            <td>{{ $dataPendaftaran->no_akte_kelahiran ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Sekolah Asal (TK)</th>
                                                            <td>{{ $dataPendaftaran->asal_sekolah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Agama</th>
                                                            <td>{{ ucfirst($dataPendaftaran->agama) ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Alamat Lengkap Tempat Tinggal</th>
                                                            <td>{{ $dataPendaftaran->alamat ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tinggal Dengan</th>
                                                            <td>{{ $dataPendaftaran->tinggal_dengan ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Anak Ke</th>
                                                            <td>{{ $dataPendaftaran->anak_ke ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Jumlah Saudara Kandung</th>
                                                            <td>{{ $dataPendaftaran->jml_saudara_kandung ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tinggi dan Berat Badan</th>
                                                            <td>{{ $dataPendaftaran->tinggi_badan ?? '' }} cm /
                                                                {{ $dataPendaftaran->berat_badan ?? '' }} kg</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td colspan="2" class="text-center">
                                                                <span class="badge bg-warning text-dark">Belum Menambahkan Data
                                                                    Calon Siswa</span>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Identitas Orang Tua -->
                                <h4 class="header-title mt-4">B. Identitas Orang Tua</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped">
                                                <tbody>
                                                    @if ($dataOrtu)
                                                        <tr>
                                                            <th scope="col" class="w-25">Nama Ayah</th>
                                                            <td>{{ $dataOrtu->nama_ayah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tempat Tanggal Lahir Ayah</th>
                                                            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ayah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">NIK Ayah</th>
                                                            <td>{{ $dataOrtu->nik_ayah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Nama Ibu</th>
                                                            <td>{{ $dataOrtu->nama_ibu ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tempat Tanggal Lahir Ibu</th>
                                                            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ibu ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">NIK Ibu</th>
                                                            <td>{{ $dataOrtu->nik_ibu ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Alamat Ayah</th>
                                                            <td>{{ $dataOrtu->alamat_ayah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Alamat Ibu</th>
                                                            <td>{{ $dataOrtu->alamat_ibu ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Pekerjaan Ayah</th>
                                                            <td>{{ $dataOrtu->pekerjaan_ayah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Pekerjaan Ibu</th>
                                                            <td>{{ $dataOrtu->pekerjaan_ibu ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Pendidikan Terakhir Ayah</th>
                                                            <td>{{ $dataOrtu->pendidikan_ayah ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Pendidikan Terakhir Ibu</th>
                                                            <td>{{ $dataOrtu->pendidikan_ibu ?? '' }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td colspan="2" class="text-center">
                                                                <span class="badge bg-warning text-dark">Belum Menambahkan Data
                                                                    Orang Tua</span>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Identitas Wali -->
                                <h4 class="header-title mt-4">C. Identitas Wali</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped">
                                                <tbody>
                                                    @if ($dataWali)
                                                        <tr>
                                                            <th scope="col" class="w-25">Nama Wali</th>
                                                            <td>{{ $dataWali->nama_wali ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tahun Lahir</th>
                                                            <td>{{ $dataWali->tahun_lahir ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Tahun Lahir</th>
                                                            <td>{{ $dataWali->pendidikan ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Pekerjaan Wali</th>
                                                            <td>{{ $dataWali->pekerjaan ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">Alamat Wali</th>
                                                            <td>{{ $dataWali->alamat ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="w-25">No. Handphone Wali</th>
                                                            <td>{{ $dataWali->no_telp ?? '' }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td colspan="2" class="text-center">
                                                                <span class="badge bg-warning text-dark">Belum Menambahkan Data
                                                                    Wali</span>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <!-- End: Formulir Data Display Card -->
            @else
                <div class="col-12 col-xl-12 mb-3 mb-xl-2">
                    <div class="card cta-box bg-success text-white h-75">
                        <div class="card-body d-flex justify-content-center align-items-center h-100">
                            <div class="text-center">
                                <h3 class="m-0 fw-normal cta-box-title">
                                    Selamat datang <b>{{ Auth::user()->name }}</b> di Website PPDB Online SD N 18 Dewantara
                                    Anda masuk sebagai <b>{{ Auth::user()->role }}</b>
                                </h3>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-6">
                    <div class="card cta-box bg-info text-white">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="uil-clipboard-alt widget-icon bg-white text-info"></i>
                            </div>
                            <h5 class="text-uppercase mt-0">Total Pendaftar</h5>
                            <h1 class="mt-2 mb-2" title="Total">{{ $totalPeserta }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-6">
                    <div class="card cta-box bg-warning text-white">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="uil-stopwatch widget-icon bg-white text-warning"></i>
                            </div>
                            <h5 class="text-uppercase mt-0">Status Verifikasi</h5>
                            <h1 class="mt-2 mb-2" title="Verified">{{ $totalVerifikasi }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-6">
                    <div class="card cta-box bg-success text-white">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="uil-check widget-icon bg-white text-success"></i>
                            </div>
                            <h5 class="text-uppercase mt-0">Total Diterima</h5>
                            <h1 class="mt-2 mb-2" title="Accepted">{{ $totalDiterima }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-6">
                    <div class="card cta-box bg-danger text-white">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="uil-sad-crying widget-icon bg-white text-danger"></i>
                            </div>
                            <h5 class="text-uppercase mt-0">Total Ditolak</h5>
                            <h1 class="mt-2 mb-2" title="Rejected">{{ $totalDitolak }}</h1>
                        </div>
                    </div>
                </div>
            @endcan

        </div>
    </div>
@endsection


@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('status') }}',
                    confirmButtonText: 'OK'
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
@endpush
