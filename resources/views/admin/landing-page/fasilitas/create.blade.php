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
                    <h4 class="page-title"> Tambah Fasilitas </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title m-t-0">Upload Foto Fasilitas Sekolah</h4>
                        <p class="text-muted font-14">
                            Drag & Drop Foto Fasilitas Sekolah
                        </p>

                        <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="myAwesomeDropzone">
                            @csrf
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script> --}}
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
                        text: "Foto fasilitas berhasil diupload.",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "{{ route('fasilitas.index') }}";
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
