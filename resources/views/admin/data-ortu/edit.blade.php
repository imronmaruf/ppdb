@extends('admin.layouts.main')

@push('title')
    Edit Identitas Orang Tua
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"><strong>Page</strong> &raquo; Edit Identitas Orang Tua</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Identitas Orang Tua</h4>

                        <!-- Alert untuk pesan error -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Kesalahan - </strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('data-ortu.update', $dataOrtu->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_ayah" class="form-label">Nama Ayah <span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="nama_ayah" name="nama_ayah"
                                            class="form-control @error('nama_ayah') is-invalid @enderror"
                                            placeholder="Nama Ayah" value="{{ old('nama_ayah', $dataOrtu->nama_ayah) }}">
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir_ayah" class="form-label">Tempat Lahir Ayah Sesuai
                                            KTP<span class="text-danger"> *</span></label>
                                        <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah"
                                            class="form-control @error('tempat_lahir_ayah') is-invalid @enderror"
                                            placeholder="Tempat Lahir Ayah"
                                            value="{{ old('tempat_lahir_ayah', $dataOrtu->tempat_lahir_ayah) }}">
                                        @error('tempat_lahir_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir_ayah" class="form-label">Tanggal Lahir Ayah<span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                                            class="form-control @error('tanggal_lahir_ayah') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir_ayah', $dataOrtu->tanggal_lahir_ayah) }}">
                                        @error('tanggal_lahir_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ayah" class="form-label">NIK Ayah<span class="text-danger">
                                                *</span></label></label>
                                        <input type="number" id="nik_ayah" name="nik_ayah"
                                            class="form-control @error('nik_ayah') is-invalid @enderror"
                                            placeholder="NIK Ayah" maxlength="16"
                                            value="{{ old('nik_ayah', $dataOrtu->nik_ayah) }}">
                                        @error('nik_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah<span
                                                class="text-danger">*</span></label>
                                        <select id="pendidikan_ayah" name="pendidikan_ayah"
                                            class="form-select @error('pendidikan_ayah') is-invalid @enderror">
                                            <option value="">----Pilih Pendidikan Ayah----</option>
                                            @foreach ($pendidikanAyahOptions as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('pendidikan_ayah', $dataOrtu->pendidikan_ayah) == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah<span
                                                class="text-danger"> *</span></label></label>
                                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                            class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                            placeholder="Pekerjaan Ayah"
                                            value="{{ old('pekerjaan_ayah', $dataOrtu->pekerjaan_ayah) }}">
                                        @error('pekerjaan_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_ayah" class="form-label">Alamat Ayah <span class="text-danger">
                                                *</span></label></label>
                                        <textarea id="alamat_ayah" name="alamat_ayah" class="form-control @error('alamat_ayah') is-invalid @enderror"
                                            placeholder="Alamat Ayah">{{ old('alamat_ayah', $dataOrtu->alamat_ayah) }}</textarea>
                                        @error('alamat_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <!-- Kolom Kanan -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_ibu" class="form-label">Nama Ibu<span class="text-danger">
                                                *</span></label></label>
                                        <input type="text" id="nama_ibu" name="nama_ibu"
                                            class="form-control @error('nama_ibu') is-invalid @enderror"
                                            placeholder="Nama Ibu" value="{{ old('nama_ibu', $dataOrtu->nama_ibu) }}">
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir_ibu" class="form-label">Tempat Lahir Ibu Sesuai
                                            KTP<span class="text-danger"> *</span></label>
                                        <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu"
                                            class="form-control @error('tempat_lahir_ibu') is-invalid @enderror"
                                            placeholder="Tempat Lahir Ibu"
                                            value="{{ old('tempat_lahir_ibu', $dataOrtu->tempat_lahir_ibu) }}">
                                        @error('tempat_lahir_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir_ibu" class="form-label">Tanggal Lahir Ibu<span
                                                class="text-danger"> *</span></label>
                                        <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu"
                                            class="form-control @error('tanggal_lahir_ibu') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir_ibu', $dataOrtu->tanggal_lahir_ibu) }}">
                                        @error('tanggal_lahir_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ibu" class="form-label">NIK Ibu<span class="text-danger">
                                                *</span></label></label>
                                        <input type="number" id="nik_ibu" name="nik_ibu"
                                            class="form-control @error('nik_ibu') is-invalid @enderror"
                                            placeholder="NIK Ibu" maxlength="16"
                                            value="{{ old('nik_ibu', $dataOrtu->nik_ibu) }}">
                                        @error('nik_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu<span
                                                class="text-danger"> *</span></label>
                                        <select id="pendidikan_ibu" name="pendidikan_ibu"
                                            class="form-select @error('pendidikan_ibu') is-invalid @enderror">
                                            <option value="">----Pilih Pendidikan Ibu----</option>
                                            @foreach ($pendidikanIbuOptions as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('pendidikan_ibu', $dataOrtu->pendidikan_ibu) == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu<span
                                                class="text-danger"> *</span></label></label>
                                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                            class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                            placeholder="Pekerjaan Ibu"
                                            value="{{ old('pekerjaan_ibu', $dataOrtu->pekerjaan_ibu) }}">
                                        @error('pekerjaan_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_ibu" class="form-label">Alamat Ibu<span class="text-danger">
                                                *</span></label></label>
                                        <textarea id="alamat_ibu" name="alamat_ibu" class="form-control @error('alamat_ibu') is-invalid @enderror"
                                            placeholder="Alamat Ibu">{{ old('alamat_ibu', $dataOrtu->alamat_ibu) }}</textarea>
                                        @error('alamat_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
