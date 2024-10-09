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

                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
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
                                            id="file" name="file" accept=".pdf,.doc,.docx">
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
                                    </div>
                                </div>

                                <!-- Preview Image -->
                                {{-- <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <img id="preview-image" src="" alt="" class="img-fluid"
                                            style="display: none;">
                                    </div>
                                </div>

                                <!-- Preview PDF -->
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <iframe id="preview-pdf" style="width: 100%; height: 500px; display: none;"
                                            frameborder="0"></iframe>
                                    </div>
                                </div> --}}


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
        // Inisialisasi Quill Editor
        var quill = new Quill('#snow-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        script: "super"
                    }, {
                        script: "sub"
                    }],
                    [{
                        header: [!1, 1, 2, 3, 4, 5, 6]
                    }, "blockquote", "code-block"],
                    [{
                            list: "ordered"
                        },
                        {
                            list: "bullet"
                        },
                        {
                            indent: "-1"
                        },
                        {
                            indent: "+1"
                        },
                    ],
                    ["direction", {
                        align: []
                    }],
                    ["link", "image"],
                    ["clean"],
                ],
            },
        });

        quill.on('text-change', function() {
            document.querySelector("input[name='isi']").value = quill.root.innerHTML;
        });

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

        // Preview PDF
        document.getElementById('file').addEventListener('change', function() {
            const file = this.files[0];
            if (file && file.type === 'application/pdf') { // Cek apakah file adalah PDF
                let reader = new FileReader();
                reader.onload = function(event) {
                    let pdfElement = document.getElementById('preview-pdf');
                    pdfElement.src = event.target.result;
                    pdfElement.style.display = 'block'; // Tampilkan PDF setelah preview
                }
                reader.readAsDataURL(file);
            } else {
                alert('File yang dipilih bukan PDF. Silakan pilih file PDF.');
                this.value = ''; // Reset input jika bukan PDF
            }
        });


        document.getElementById('judul').addEventListener('input', function() {
            var judul = this.value;
            var slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            document.getElementById('slug').setAttribute('placeholder', slug);
        });
    </script>
@endpush
