@extends('admin.layouts.main')

@push('title')
    Admin | Pengaturan Jadwal
@endpush

@section('content')
    <div class="container-fluid ">
        <!-- start page title -->
        <div class="row ">
            <div class="col-12  d-flex justify-content-center">
                <div class="page-title-box">
                    <h4 class="page-title">Page &raquo; Pengaturan Jadwal PPDB</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row d-flex justify-content-center ">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="text-uppercase mb-3">Pengaturan PPDB</h3>
                        </div>

                        <form action="{{ route('ppdb-settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tanggal_mulai"
                                                name="tanggal_mulai"
                                                value="{{ old('tanggal_mulai', $setting->tanggal_mulai ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tanggal_akhir"
                                                name="tanggal_akhir"
                                                value="{{ old('tanggal_akhir', $setting->tanggal_akhir ?? '') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                        </form>

                        <hr>

                        <h3>Status Pendaftaran</h3>
                        <p>Status saat ini: <strong>{{ $setting->is_open ? 'Dibuka' : 'Ditutup' }}</strong></p>

                        <form action="{{ route('ppdb-settings.toggle') }}" method="POST">
                            @csrf
                            <input type="checkbox" id="switch3" name="is_open" value="1"
                                {{ $setting->is_open ? 'checked' : '' }} data-switch="success"
                                onchange="this.form.submit()">
                            <label for="switch3" data-on-label="Buka" data-off-label="Tutup"></label>
                        </form>




                        {{-- <h3>Status Pendaftaran</h3>
                        <p>Status saat ini: <strong>{{ $setting->is_open ? 'Terbuka' : 'Tertutup' }}</strong></p>
                        <form action="{{ route('ppdb-settings.toggle') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $setting->is_open ? 'btn-danger' : 'btn-success' }}">
                                {{ $setting->is_open ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' }}
                            </button>
                        </form> --}}

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
