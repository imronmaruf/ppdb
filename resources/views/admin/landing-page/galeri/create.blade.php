@extends('admin.layouts.main')

@push('title')
    Tambah Galeri
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Tambah Galeri</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title m-t-0">Upload Foto Galeri Sekolah</h4>

                        <!-- Form untuk dropdown kategori -->
                        <form id="categoryForm" action="{{ route('galeri.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori">
                                    <option selected="">---Pilih Kategori---</option>
                                    <option value="akademik" {{ old('kategori') == 'akademik' ? 'selected' : '' }}>Akademik
                                    </option>
                                    <option value="non-akademik" {{ old('kategori') == 'non-akademik' ? 'selected' : '' }}>
                                        Non-Akademik</option>
                                </select>
                            </div>
                        </form>

                        <!-- Form untuk Dropzone -->
                        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="myAwesomeDropzone">
                            @csrf
                            <input type="hidden" name="kategori" id="hidden-kategori" value="{{ old('kategori') }}">
                            <div class="dz-message needsclick">
                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                <h3>Drop File Foto Disini.</h3>
                            </div>
                        </form>

                        <button id="submit-all" class="btn btn-primary mt-3">Upload Files</button>

                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>
                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                                alt="">
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted"
                                                data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end preview -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/assets/js/vendor/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            autoProcessQueue: false, // Mencegah pengunggahan otomatis
            uploadMultiple: true, // Mengizinkan pengunggahan multiple
            parallelUploads: 10, // Jumlah file yang diunggah sekaligus
            maxFilesize: 2, // Ukuran maksimum file dalam MB
            acceptedFiles: 'image/*', // Jenis file yang diterima
            addRemoveLinks: true,
            dictRemoveFile: "Remove file",
            previewsContainer: "#file-previews", // Kontainer untuk preview
            previewTemplate: document.querySelector('#uploadPreviewTemplate').innerHTML, // Template preview
            init: function() {
                var myDropzone = this;

                // Menangani klik tombol "Upload Files"
                document.getElementById("submit-all").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Mengambil kategori dari dropdown
                    var kategori = document.getElementById("kategori").value;
                    document.getElementById("hidden-kategori").value = kategori;

                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue(); // Mulai proses pengunggahan
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Tidak ada file",
                            text: "Silakan tambahkan file sebelum mengupload.",
                        });
                    }
                });

                // Redirect setelah pengunggahan berhasil
                myDropzone.on("successmultiple", function(files, response) {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: "Galeri berhasil diupload.",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "{{ route('galeri.index') }}";
                    });
                });

                // Menangani error selama pengunggahan
                myDropzone.on("errormultiple", function(files, response) {
                    Swal.fire({
                        icon: "error",
                        title: "Ooops!",
                        text: "Terjadi kesalahan saat mengupload file.",
                    });
                });
            }
        };
    </script>
@endpush
