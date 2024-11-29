@extends('admin.layouts.main')

@push('title')
    Tambah Berkas Calon Siswa
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"><strong>Page</strong> &raquo;Tambah Berkas Calon Siswa</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Tambah Berkas Calon Siswa</h4>

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

                        <form action="{{ route('data-berkas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="akte_kelahiran" class="form-label">Akte Kelahiran <span
                                                class="text-danger">*</span></label>
                                        @if (old('akte_kelahiran') || (isset($pesertaPpdb->berkas->akte_kelahiran) && !$errors->has('akte_kelahiran')))
                                            <p>File telah di-upload: <a
                                                    href="{{ old('akte_kelahiran', $pesertaPpdb->berkas->akte_kelahiran) }}"
                                                    target="_blank">Lihat Akte Kelahiran</a></p>
                                        @else
                                            <input type="file" id="akte_kelahiran" name="akte_kelahiran"
                                                class="form-control @error('akte_kelahiran') is-invalid @enderror"
                                                value="{{ old('akte_kelahiran') }}">
                                            @error('akte_kelahiran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="kk" class="form-label">Kartu Keluarga <span
                                                class="text-danger">*</span></label>
                                        @if (isset($pesertaPpdb->berkas->kk))
                                            <p>File telah di-upload: <a href="{{ $pesertaPpdb->berkas->kk }}"
                                                    target="_blank">Lihat Kartu Keluarga</a></p>
                                        @else
                                            <input type="file" id="kk" name="kk"
                                                class="form-control @error('kk') is-invalid @enderror">
                                            @error('kk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="ktp_ortu" class="form-label">KTP Orang Tua <span
                                                class="text-danger">*</span></label>
                                        @if (isset($pesertaPpdb->berkas->ktp_ortu))
                                            <p>File telah di-upload: <a href="{{ $pesertaPpdb->berkas->ktp_ortu }}"
                                                    target="_blank">Lihat KTP Orang Tua</a></p>
                                        @else
                                            <input type="file" id="ktp_ortu" name="ktp_ortu"
                                                class="form-control @error('ktp_ortu') is-invalid @enderror">
                                            @error('ktp_ortu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div> <!-- end col -->

                                <!-- Kolom Kanan -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ijazah" class="form-label">Ijazah <span
                                                class="text-danger">*</span></label>
                                        @if (isset($pesertaPpdb->berkas->ijazah))
                                            <p>File telah di-upload: <a href="{{ $pesertaPpdb->berkas->ijazah }}"
                                                    target="_blank">Lihat Ijazah</a></p>
                                        @else
                                            <input type="file" id="ijazah" name="ijazah"
                                                class="form-control @error('ijazah') is-invalid @enderror">
                                            @error('ijazah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="kartu_pkh" class="form-label">Kartu PKH <span
                                                class="text-danger">*</span></label>
                                        @if (isset($pesertaPpdb->berkas->kartu_pkh))
                                            <p>File telah di-upload: <a href="{{ $pesertaPpdb->berkas->kartu_pkh }}"
                                                    target="_blank">Lihat Kartu PKH</a></p>
                                        @else
                                            <input type="file" id="kartu_pkh" name="kartu_pkh"
                                                class="form-control @error('kartu_pkh') is-invalid @enderror">
                                            @error('kartu_pkh')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="pas_foto" class="form-label">Pas Foto <span
                                                class="text-danger">*</span></label>
                                        @if (isset($pesertaPpdb->berkas->pas_foto))
                                            <p>File telah di-upload: <a href="{{ $pesertaPpdb->berkas->pas_foto }}"
                                                    target="_blank">Lihat Pas Foto</a></p>
                                        @else
                                            <input type="file" id="pas_foto" name="pas_foto"
                                                class="form-control @error('pas_foto') is-invalid @enderror"
                                                onchange="previewImage()">
                                            @error('pas_foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <img id="pas_foto_preview" src="#" alt="Preview Pas Foto"
                                                style="display: none; max-height: 200px; margin-top: 10px;">
                                        @endif
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

@push('js')
    <script>
        function previewImage() {
            const fileInput = document.getElementById('pas_foto');
            const preview = document.getElementById('pas_foto_preview');
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
@endpush
