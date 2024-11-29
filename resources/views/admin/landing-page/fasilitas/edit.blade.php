@extends('admin.layouts.main')

@push('title')
    Edit Fasilitas
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Fasilitas</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title m-t-0">Update Foto Fasilitas Sekolah</h4>

                        <!-- Form untuk data fasilitas -->
                        <form id="fasilitasForm" action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Nama Fasilitas</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nama Fasilitas" value="{{ old('name', $fasilitas->name) }}" required>
                            </div>

                            <!-- Preview Gambar Lama -->
                            @if ($fasilitas->foto_url)
                                <div class="mb-3">
                                    <label class="form-label">Foto Saat Ini</label>
                                    <div>
                                        <img src="{{ asset($fasilitas->foto_url) }}" alt="Current Photo"
                                            class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                </div>
                            @endif

                            <!-- Input File Gambar Baru -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Upload Foto Baru</label>
                                <input type="file" class="form-control" id="foto_url" name="foto_url" accept="image/*">
                            </div>

                            <a type="button" class="btn btn-secondary mt-3 me-2" href="{{ route('fasilitas.index') }}">
                                <i class="mdi mdi-chevron-double-left me-1"></i> <span>Kembali</span>
                            </a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $errors->first() }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        </script>
    @endif
@endpush
