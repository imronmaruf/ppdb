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
                    <h4 class="page-title">Tambah Berkas Calon Siswa</h4>
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
                                        <label for="akte_kelahiran" class="form-label">Akte Kelahiran</label>
                                        <input type="file" id="akte_kelahiran" name="akte_kelahiran" class="form-control"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kk" class="form-label">Kartu Keluarga</label>
                                        <input type="file" id="kk" name="kk" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ktp_ortu" class="form-label">KTP Orang Tua</label>
                                        <input type="file" id="ktp_ortu" name="ktp_ortu" class="form-control" required>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ijazah" class="form-label">Ijazah</label>
                                        <input type="file" id="ijazah" name="ijazah" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="kartu_pkh" class="form-label">Kartu PKH</label>
                                        <input type="file" id="kartu_pkh" name="kartu_pkh" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pas_foto" class="form-label">Pas Foto</label>
                                        <input type="file" id="pas_foto" name="pas_foto" class="form-control"
                                            onchange="previewImage()" required>
                                        <img id="pas_foto_preview" class="img-fluid mt-2" src="#"
                                            alt="Preview Pas Foto" style="display:none;">
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
