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
                        <div class="alert alert-success" role="alert">
                            <i class="dripicons-information me-2"></i> Input yang memiliki tanda
                            <strong class="text-danger"> *</strong> adalah input yang harus diisi. <br>
                        </div>

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

                        <form action="{{ route('data-wali.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="nama_wali" class="form-label">Nama Wali<span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="nama_wali" name="nama_wali"
                                            class="form-control  @error('nama_wali') is-invalid @enderror"
                                            placeholder="Nama Wali" value="{{ old('nama_wali') }}">
                                        @error('nama_wali')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="no_telp" class="form-label">No Telp</label>
                                        <input type="text" id="no_telp" name="no_telp" class="form-control"
                                            placeholder="No Telp" value="{{ old('no_telp') }}">
                                    </div> --}}

                                    <div class="mb-2">
                                        <label for="tahun_lahir" class="form-label">Tahun Lahir <span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="tahun_lahir" name="tahun_lahir"
                                            class="form-control @error('tahun_lahir') is-invalid @enderror"
                                            placeholder="Tahun Lahir" value="{{ old('tahun_lahir') }}">
                                        @error('tahun_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    {{-- <div class="mb-2">
                                        <label for="pendidikan" class="form-label">Pendidikan<span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="pendidikan" name="pendidikan"
                                            class="form-control  @error('pendidikan') is-invalid @enderror"
                                            placeholder="Pendidikan" value="{{ old('pendidikan') }}">
                                        @error('pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="mb-2">
                                        <label for="pendidikan" class="form-label">Pendidikan Wali<span
                                                class="text-danger">*</span></label>
                                        <select id="pendidikan" name="pendidikan"
                                            class="form-select @error('pendidikan') is-invalid @enderror">
                                            <option value="">----Pilih Pendidikan Wali----</option>
                                            @foreach ($pendidikanWaliOptions as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('pendidikan') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="mb-2">
                                        <label for="pendidikan" class="form-label">Pendidikan Wali<span
                                                class="text-danger">*</span></label>
                                        <select id="pendidikan" name="pendidikan"
                                            class="form-select @error('pendidikan') is-invalid @enderror">
                                            <option value="">----Pilih Pendidikan Wali----</option>
                                            @foreach ($pendidikanWaliOptions as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('pendidikan') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="mb-2">
                                        <label for="pekerjaan" class="form-label">Pekerjaan <span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="pekerjaan" name="pekerjaan"
                                            class="form-control  @error('pekerjaan') is-invalid @enderror"
                                            placeholder="Pekerjaan" value="{{ old('pekerjaan') }}">
                                        @error('pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat <span class="text-danger">
                                                *</span></label>
                                        <textarea id="alamat" name="alamat" class="form-control  @error('alamat') is-invalid @enderror"
                                            placeholder="Alamat Wali" rows="5"></textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
