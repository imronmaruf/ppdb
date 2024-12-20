@extends('admin.layouts.main')

@push('title')
    Tambah Tentang & Kontak
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Page &raquo; Tentang & Kontak</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Tentang & Kontak</h4>

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

                        <form action="{{ route('tentang-kontak.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="konten_tentang" class="form-label">Konten</label>
                                        <textarea id="konten_tentang" name="konten_tentang" class="form-control" rows="8" placeholder="Konten Tentang"
                                            value="{{ old('tentang_konten') }}"></textarea>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Gambar</label>
                                        <input type="file" id="foto" name="foto" class="form-control"
                                            onchange="previewImage()" required>
                                        <img id="foto_preview" class="img-fluid mt-2" src="#" alt="Preview Foto"
                                            style="display:none; height: 180px">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control"
                                            placeholder="alamat" value="{{ old('alamat') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="no_telp" class="form-label">NO. Telp / WA</label>
                                        <input type="number" id="no_telp" name="no_telp" class="form-control"
                                            placeholder="No Telp / WA" value="{{ old('no_telp') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="wa_link" class="form-label">Link WhatsApp</label>
                                        <input type="text" id="wa_link" name="wa_link" class="form-control"
                                            placeholder="wa_link" value="{{ old('wa_link') }}">
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
@push('js')
    <script>
        function previewImage() {
            const fileInput = document.getElementById('foto');
            const preview = document.getElementById('foto_preview');
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
