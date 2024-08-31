@extends('admin.layouts.main')

@push('title')
    Form Identitas Orang Tua
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
                    <h4 class="page-title">Form Identitas Orang Tua</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Identitas Orang Tua</h4>

                        <!-- Alert untuk pesan error -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('data-ortu.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                        <input type="text" id="nama_ayah" name="nama_ayah" class="form-control"
                                            placeholder="Nama Ayah" value="{{ old('nama_ayah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir_tanggal_lahir_ayah" class="form-label">Tempat Tanggal Lahir
                                            Ayah</label>
                                        <input type="text" id="tempat_lahir_tanggal_lahir_ayah"
                                            name="tempat_lahir_tanggal_lahir_ayah" class="form-control"
                                            placeholder="Tempat Tanggal Lahir Ayah"
                                            value="{{ old('tempat_lahir_tanggal_lahir_ayah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ayah" class="form-label">NIK Ayah</label>
                                        <input type="text" id="nik_ayah" name="nik_ayah" class="form-control"
                                            placeholder="NIK Ayah" maxlength="16" value="{{ old('nik_ayah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah</label>
                                        <input type="text" id="pendidikan_ayah" name="pendidikan_ayah"
                                            class="form-control" placeholder="Pendidikan Ayah"
                                            value="{{ old('pendidikan_ayah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control"
                                            placeholder="Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                                        <input type="text" id="alamat_ayah" name="alamat_ayah" class="form-control"
                                            placeholder="Alamat Ayah" value="{{ old('alamat_ayah') }}">
                                    </div>

                                </div> <!-- end col -->

                                <!-- Kolom Kanan -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                        <input type="text" id="nama_ibu" name="nama_ibu" class="form-control"
                                            placeholder="Nama Ibu" value="{{ old('nama_ibu') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir_tanggal_lahir_ibu" class="form-label">Tempat Tanggal Lahir
                                            Ibu</label>
                                        <input type="text" id="tempat_lahir_tanggal_lahir_ibu"
                                            name="tempat_lahir_tanggal_lahir_ibu" class="form-control"
                                            placeholder="Tempat Tanggal Lahir Ibu"
                                            value="{{ old('tempat_lahir_tanggal_lahir_ibu') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ibu" class="form-label">NIK Ibu</label>
                                        <input type="text" id="nik_ibu" name="nik_ibu" class="form-control"
                                            placeholder="NIK Ibu" maxlength="16" value="{{ old('nik_ibu') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                                        <input type="text" id="pendidikan_ibu" name="pendidikan_ibu"
                                            class="form-control" placeholder="Pendidikan Ibu"
                                            value="{{ old('pendidikan_ibu') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                            class="form-control" placeholder="Pekerjaan Ibu"
                                            value="{{ old('pekerjaan_ibu') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                                        <input type="text" id="alamat_ibu" name="alamat_ibu" class="form-control"
                                            placeholder="Alamat Ibu" value="{{ old('alamat_ibu') }}">
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container-fluid -->
@endsection
