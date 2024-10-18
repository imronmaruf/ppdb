@extends('admin.layouts.main')

@push('title')
    Dashboard {{ ucfirst(Auth::user()->role ?? '') }} | Tambah Berita
@endpush

@push('css')
    <!-- Quill css -->
    <link href="{{ asset('admin/assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Page &raquo; Tambah Berita</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="text-uppercase mb-3">Buat Berita</h3>
                        </div>

                        <form action="{{ route('data-berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div class="row">
                                    <!-- Judul Berita -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul Berita<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="judul" name="judul"
                                                class="form-control @error('judul') is-invalid @enderror"
                                                placeholder="Judul Berita" value="{{ old('judul') }}">
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Slug<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="slug" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror" placeholder="Slug"
                                                value="{{ old('slug') }}" disabled>
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Kategori Berita -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Berita<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('kategori_berita_id') is-invalid @enderror"
                                                name="kategori_berita_id">
                                                <option selected disabled>--- Pilih Kategori ---</option>
                                                @foreach ($kategoriBerita as $kategori)
                                                    <option value="{{ $kategori->id }}"
                                                        {{ old('kategori_berita_id') == $kategori->id ? 'selected' : '' }}>
                                                        {{ $kategori->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori_berita_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status Berita -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status Berita<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('status') is-invalid @enderror"
                                                name="status">
                                                <option selected disabled>--- Pilih Status ---</option>
                                                <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>
                                                    Publish</option>
                                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                                    Draft</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Gambar dan File -->
                                <div class="row g-2 mb-3">
                                    <div class="col-sm-6">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                            id="gambar" name="gambar" accept="image/*">
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="file" class="form-label">File</label>
                                        <input class="form-control @error('file') is-invalid @enderror" type="file"
                                            id="file" name="file"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt">
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-sm-6">
                                        <img id="preview-image" src="" alt="" class="img-fluid"
                                            style="display: none;">
                                    </div>
                                    <div class="col-sm-6">
                                        <iframe id="preview-pdf" style="width: 100%; height: 350px; display: none;"
                                            frameborder="0"></iframe>
                                        <div id="preview-file" class="mt-2" style="display: none;">
                                            <!-- File preview area for non-image and non-PDF files -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Editor -->
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Isi Berita<span
                                            class="text-danger">*</span></label>
                                    <div id="snow-editor" style="height: 300px;">{!! old('isi') !!}</div>
                                    <input type="hidden" id="isi" name="isi" value="{{ old('isi') }}">
                                    @error('isi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/assets/js/vendor/quill.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/quill.js') }}"></script>

    {{-- <script src="{{ asset('admin/assets/js/pages/demo.quilljs.js') }}"></script> --}}
    <script>
        let errorMessage = '{{ session('error') }}';
        if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
                showConfirmButton: true,
                // timer: 1500
            });
        }


        // Preview Gambar
        document.getElementById('gambar').addEventListener('change', function() {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) { // Cek apakah file adalah gambar
                let reader = new FileReader();
                reader.onload = function(event) {
                    let imgElement = document.getElementById('preview-image');
                    imgElement.src = event.target.result;
                    imgElement.style.display = 'block'; // Tampilkan gambar setelah preview
                }
                reader.readAsDataURL(file);
            } else {
                alert('File yang dipilih bukan gambar. Silakan pilih file gambar.');
                this.value = ''; // Reset input jika bukan gambar
            }
        });

        // Preview Word, Excel, and other document types
        document.getElementById('file').addEventListener('change', function() {
            const file = this.files[0];
            const fileTypes = ['application/pdf', 'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ];

            if (file && fileTypes.includes(file.type)) {
                let previewElement = document.getElementById('preview-file');

                if (file.type === 'application/pdf') {
                    // Preview PDF
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let pdfElement = document.getElementById('preview-pdf');
                        pdfElement.src = event.target.result;
                        pdfElement.style.display = 'block'; // Show PDF after preview
                    };
                    reader.readAsDataURL(file);
                } else {
                    // For Word, Excel, and PowerPoint: show file icon or message
                    previewElement.innerHTML = `<span class="file-icon">${file.name}</span>`;
                    previewElement.style.display = 'block';
                }
            } else {
                alert('File type not supported for preview.');
                this.value = ''; // Reset input if not supported
            }
        });



        document.getElementById('judul').addEventListener('input', function() {
            var judul = this.value;
            var slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            document.getElementById('slug').setAttribute('placeholder', slug);
        });
    </script>
@endpush
