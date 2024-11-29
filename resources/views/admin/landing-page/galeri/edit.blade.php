@extends('admin.layouts.main')

@push('title')
    Edit Galeri
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Galeri</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title m-t-0">Edit Foto Galeri Sekolah</h4>

                        <form id="editForm" action="{{ route('galeri.update', $galeri->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Judul Galeri</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Judul"
                                        value="{{ old('title', $galeri->title) }}" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                                        name="kategori">
                                        <option value="akademik"
                                            {{ old('kategori', $galeri->kategori) == 'akademik' ? 'selected' : '' }}>
                                            Akademik</option>
                                        <option value="non-akademik"
                                            {{ old('kategori', $galeri->kategori) == 'non-akademik' ? 'selected' : '' }}>
                                            Non-Akademik</option>
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="caption" class="form-label">Caption <br>Keterangan: <code>maksimal 500
                                        karakter</code></label>
                                <textarea class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption"
                                    placeholder="Caption" rows="4" required>{{ old('caption', $galeri->caption) }}</textarea>
                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="foto_url" class="form-label">Foto</label>
                                <input type="file" class="form-control @error('foto_url') is-invalid @enderror"
                                    id="foto_url" name="foto_url">
                                @error('foto_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3" id="preview-container">
                                <label class="form-label">Preview Foto</label><br>
                                <img src="{{ asset($galeri->foto_url) }}" alt="Preview Foto" class="img-fluid"
                                    style="max-height: 200px;" id="preview-image">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        document.getElementById('foto_url').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const previewImage = document.getElementById('preview-image');
                previewImage.src = URL.createObjectURL(file);
                previewImage.onload = function() {
                    URL.revokeObjectURL(this.src);
                }
            }
        });
    </script>
@endpush
