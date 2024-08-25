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
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="header-title">Data Identitas Orang Tua</h4>
                            <div>
                                @if ($dataOrtu)
                                    <!-- Tombol Edit Data jika data sudah ada -->
                                    <a type="button" class="btn btn-warning me-2"
                                        href="{{ route('data-ortu.edit', $dataOrtu->id) }}">
                                        <i class="mdi mdi-pencil"></i> <span>Edit Data</span>
                                    </a>
                                @else
                                    <!-- Tombol Tambah Data jika data belum ada -->
                                    <a type="button" class="btn btn-info" href="{{ route('data-ortu.create') }}">
                                        <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if ($dataOrtu)
                            <h4 class="header-title">B. Identitas Ayah</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Ayah</th>
                                            <td>{{ $dataOrtu->nama_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir Ayah</th>
                                            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">NIK Ayah</th>
                                            <td>{{ $dataOrtu->nik_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pendidikan Ayah</th>
                                            <td>{{ $dataOrtu->pendidikan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pekerjaan Ayah</th>
                                            <td>{{ $dataOrtu->pekerjaan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Ayah</th>
                                            <td>{{ $dataOrtu->alamat_ayah }}</td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->

                                <h4 class="header-title mt-3">C. Identitas Ibu</h4>
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Nama Ibu</th>
                                            <td>{{ $dataOrtu->nama_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tempat Tanggal Lahir Ibu</th>
                                            <td>{{ $dataOrtu->tempat_lahir_tanggal_lahir_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">NIK Ibu</th>
                                            <td>{{ $dataOrtu->nik_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pendidikan Ibu</th>
                                            <td>{{ $dataOrtu->pendidikan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pekerjaan Ibu</th>
                                            <td>{{ $dataOrtu->pekerjaan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat Ibu</th>
                                            <td>{{ $dataOrtu->alamat_ibu }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- end row -->
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">Data Orang Tua belum
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
