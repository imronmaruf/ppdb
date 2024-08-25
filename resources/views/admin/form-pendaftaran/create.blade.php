@extends('admin.layouts.main')

@push('title')
    Form Pendaftaran
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
                    <h4 class="page-title">Form Input Peserta PPDB</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Data Peserta PPDB</h4>

                        <!-- Alert untuk pesan sukses -->
                        {{-- @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif --}}

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

                        <form action="{{ route('data-pendaftaran.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Nama Lengkap" value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="laki-laki"
                                                {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="perempuan"
                                                {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                            placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                                            value="{{ old('tanggal_lahir') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                                        <input type="text" id="kk" name="kk" class="form-control"
                                            placeholder="Nomor KK" maxlength="20" value="{{ old('kk') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" id="nik" name="nik" class="form-control"
                                            placeholder="Nomor NIK" maxlength="16" value="{{ old('nik') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_akte_kelahiran" class="form-label">Nomor Akte Kelahiran</label>
                                        <input type="text" id="no_akte_kelahiran" name="no_akte_kelahiran"
                                            class="form-control" placeholder="Nomor Akte Kelahiran" maxlength="20"
                                            value="{{ old('no_akte_kelahiran') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="status_pkh" class="form-label">Status PKH</label>
                                        <select class="form-select" id="status_pkh" name="status_pkh">
                                            <option value="ada" {{ old('status_pkh') == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak" {{ old('status_pkh') == 'tidak' ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                        <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                            placeholder="Asal Sekolah" value="{{ old('asal_sekolah') }}">
                                    </div>

                                </div> <!-- end col -->

                                <!-- Kolom Kanan -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <select class="form-select" id="agama" name="agama">
                                            <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam
                                            </option>
                                            <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : '' }}>
                                                Katolik
                                            </option>
                                            <option value="protestan" {{ old('agama') == 'protestan' ? 'selected' : '' }}>
                                                Protestan</option>
                                            <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu
                                            </option>
                                            <option value="buddha" {{ old('agama') == 'buddha' ? 'selected' : '' }}>Buddha
                                            </option>
                                            <option value="konghucu" {{ old('agama') == 'konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat Lengkap">{{ old('alamat') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tinggal_dengan" class="form-label">Tinggal Dengan</label>
                                        <input type="text" id="tinggal_dengan" name="tinggal_dengan"
                                            class="form-control" placeholder="Tinggal Dengan"
                                            value="{{ old('tinggal_dengan') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="anak_ke" class="form-label">Anak Ke</label>
                                        <input type="text" id="anak_ke" name="anak_ke" class="form-control"
                                            placeholder="Anak Ke" maxlength="2" value="{{ old('anak_ke') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jml_saudara_kandung" class="form-label">Jumlah Saudara Kandung</label>
                                        <input type="text" id="jml_saudara_kandung" name="jml_saudara_kandung"
                                            class="form-control" placeholder="Jumlah Saudara Kandung" maxlength="2"
                                            value="{{ old('jml_saudara_kandung') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                                        <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control"
                                            placeholder="Tinggi Badan" step="0.1" value="{{ old('tinggi_badan') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                                        <input type="number" id="berat_badan" name="berat_badan" class="form-control"
                                            placeholder="Berat Badan" step="0.1" value="{{ old('berat_badan') }}">
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
