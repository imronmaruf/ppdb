@extends('admin.layouts.main')

@push('title')
    Tambah Fasilitas
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Tambah Fasilitas</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title m-t-0">Upload Foto Fasilitas Sekolah</h4>

                        <!-- Form untuk data fasilitas -->
                        <form id="fasilitasForm" action="{{ route('fasilitas.store') }}" method="POST">
                            @csrf

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Nama Fasilitas</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nama Fasilitas" required>
                            </div>
                        </form>

                        <!-- Form untuk Dropzone -->
                        <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="myAwesomeDropzone">
                            @csrf
                            <input type="hidden" name="name" id="hidden-name" value="{{ old('name') }}">
                            <div class="dz-message needsclick">
                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                <h3>Drop File Foto Disini.</h3>
                            </div>
                        </form>

                        <a type="button" class="btn btn-secondary mt-3 me-2" href="{{ route('fasilitas.index') }}">
                            <i class="mdi mdi-chevron-double-left me-1"></i> <span>Kembali</span>
                        </a>
                        <button id="submit-all" class="btn btn-primary mt-3"> Simpan</button>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                document.getElementById("submit-all").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var name = document.getElementById("name").value;
                    document.getElementById("hidden-name").value = name;

                    if (myDropzone.getQueuedFiles().length === 0) {
                        // Jika tidak ada file, tampilkan pesan error dan submit form fasilitas
                        Swal.fire({
                            icon: "error",
                            title: "Tidak ada file",
                            text: "Silakan tambahkan file sebelum mengupload.",
                        }).then(function() {
                            document.getElementById("fasilitasForm").submit();
                        });
                    } else {
                        // Jika ada file, proses pengunggahan
                        myDropzone.processQueue();
                    }
                });

                myDropzone.on("successmultiple", function(files, response) {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: "Foto fasilitas berhasil diupload.",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.replace("{{ route('fasilitas.index') }}");
                    });
                });

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
