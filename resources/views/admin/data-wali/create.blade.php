@extends('admin.layouts.main')

@push('title')
    Form Identitas Wali
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Form Identitas Wali</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Identitas Wali</h4>

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

                        <form action="{{ route('data-wali.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_wali" class="form-label">Nama Wali</label>
                                        <input type="text" id="nama_wali" name="nama_wali" class="form-control"
                                            placeholder="Nama Wali" value="{{ old('nama_wali') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_telp" class="form-label">No Telp</label>
                                        <input type="text" id="no_telp" name="no_telp" class="form-control"
                                            placeholder="No Telp" value="{{ old('no_telp') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tahun_lahir" class="form-label">Tahun Lahir</label>
                                        <input type="number" id="tahun_lahir" name="tahun_lahir" class="form-control"
                                            placeholder="Tahun Lahir" value="{{ old('tahun_lahir') }}">
                                    </div>


                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="pendidikan" class="form-label">Pendidikan</label>
                                        <input type="text" id="pendidikan" name="pendidikan" class="form-control"
                                            placeholder="Pendidikan" value="{{ old('pendidikan') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"
                                            placeholder="Pekerjaan" value="{{ old('pekerjaan') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat Wali"></textarea>
                                    </div>
                                </div>
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
