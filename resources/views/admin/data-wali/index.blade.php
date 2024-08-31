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
                    <h4 class="page-title">Page &raquo; Form Identitas Wali</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="header-title">Data Identitas Wali</h4>
                            <div>
                                @if ($dataWali)
                                    <!-- Tombol Edit Data jika data sudah ada -->
                                    <a type="button" class="btn btn-warning me-2"
                                        href="{{ route('data-wali.edit', $dataWali->id) }}">
                                        <i class="mdi mdi-pencil"></i> <span>Edit Data</span>
                                    </a>
                                @else
                                    <!-- Tombol Tambah Data jika data belum ada -->
                                    <a type="button" class="btn btn-info" href="{{ route('data-wali.create') }}">
                                        <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if ($dataWali)
                            <h4 class="header-title">Identitas Wali</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Wali</th>
                                            <td>{{ $dataWali->nama_wali }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tahun Lahir Wali</th>
                                            <td>{{ $dataWali->tahun_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">No. Telepon Wali</th>
                                            <td>{{ $dataWali->no_telp }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pendidikan Wali</th>
                                            <td>{{ $dataWali->pendidikan }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pekerjaan Wali</th>
                                            <td>{{ $dataWali->pekerjaan }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Wali</th>
                                            <td>{{ $dataWali->alamat }}</td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">Data Wali belum
                                                    ditambahkan</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                        @endif

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
@endsection
