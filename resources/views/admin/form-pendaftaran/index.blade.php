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
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Analytics</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="header-title">Data Identitas Calon Siswa</h4>
                            <div>
                                @if ($dataPendaftar)
                                    <!-- Tombol Edit Data jika data sudah ada -->
                                    <a type="button" class="btn btn-warning me-2"
                                        href="{{ route('data-pendaftaran.edit', $dataPendaftar->id) }}">
                                        <i class="mdi mdi-pencil"></i> <span>Edit Data</span>
                                    </a>
                                @else
                                    <!-- Tombol Tambah Data jika data belum ada -->
                                    <a type="button" class="btn btn-info" href="{{ route('data-pendaftaran.create') }}">
                                        <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <h4 class="header-title mt-3">A. Identitas Calon Siswa</h4>
                        @if ($dataPendaftar)
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Lengkap Calon Siswa</th>
                                            <td>{{ $dataPendaftar->name ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Jenis Kelamin</th>
                                            <td>{{ $dataPendaftar->jenis_kelamin ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir</th>
                                            <td>{{ $dataPendaftar->tempat_lahir ?? 'Data Belum Diisi' }},
                                                {{ $dataPendaftar->tanggal_lahir ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">No KK</th>
                                            <td>{{ $dataPendaftar->kk ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">NIK Siswa</th>
                                            <td>{{ $dataPendaftar->nik ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">No Akte Kelahiran</th>
                                            <td>{{ $dataPendaftar->no_akte_kelahiran ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Penerima PKH</th>
                                            <td>{{ $dataPendaftar->status_pkh ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Sekolah Asal (TK)</th>
                                            <td>{{ $dataPendaftar->asal_sekolah ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Agama/Kepercayaan</th>
                                            <td>{{ $dataPendaftar->agama ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Lengkap Tempat Tinggal</th>
                                            <td>{{ $dataPendaftar->alamat ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tinggal Bersama</th>
                                            <td>{{ $dataPendaftar->tinggal_dengan ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Anak Ke</th>
                                            <td>{{ $dataPendaftar->anak_ke ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Jumlah Saudara Kandung</th>
                                            <td>{{ $dataPendaftar->jml_saudara_kandung ?? 'Data Belum Diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tinggi dan Berat Badan</th>
                                            <td>{{ $dataPendaftar->tinggi_badan ?? 'Data Belum Diisi' }} CM /
                                                {{ $dataPendaftar->berat_badan ?? 'Data Belum Diisi' }} KG</td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">Data belum ditambahkan</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                        @endif

                        <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
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
