@extends('admin.layouts.main')

@push('title')
    Detail Berita
@endpush

@push('css')
    <style>
        .pdf-viewer {
            width: 100%;
            height: 600px;
            /* Sesuaikan tinggi iframe sesuai kebutuhan Anda */
            border: 1px solid #ccc;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a type="button" class="btn btn-secondary" href="{{ route('berita.index') }}">
                            <i class="mdi mdi-arrow-left me-2"></i> <span>Kembali</span>
                        </a>
                    </div>
                    <h4 class="page-title">Page &raquo; Data Berita</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="header-title">Detail Berita </h4>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="w-25">Judul Berita</th>
                                            <td class="w-75">{{ $dataBerita->judul }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="w-25">Slug</th>
                                            <td class="w-75">{{ $dataBerita->slug }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="w-25">Status</th>
                                            <td class="w-75">
                                                @if ($dataBerita->status == 'draft')
                                                    <h5><span
                                                            class="badge bg-warning">{{ ucfirst($dataBerita->status) }}</span>
                                                    </h5>
                                                @else
                                                    <h5><span
                                                            class="badge bg-success">{{ ucfirst($dataBerita->status) }}</span>
                                                    </h5>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="w-25">Kategori</th>
                                            <td class="w-75">{{ $dataBerita->kategoriBerita->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="w-25">Isi Konten</th>
                                            <td class="w-75">{!! $dataBerita->isi !!}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="w-25">Gambar</th>
                                            <td class="w-75"><img src="{{ asset($dataBerita->gambar) }}" alt="gambar"
                                                    style="width:50%"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Akte Kelahiran</th>
                                            <td>
                                                @if ($dataBerita && $dataBerita->file)
                                                    <a href="{{ asset($dataBerita->file) }}"
                                                        download="{{ $dataBerita->file }}" target="_blank">
                                                        <span class="text-primary text-decoration-underline">Download</span>
                                                    </a>
                                                    <br>
                                                    <iframe src="{{ asset($dataBerita->file) }}" class="pdf-viewer mt-2"
                                                        frameborder="0">
                                                        Your browser does not support PDFs.
                                                        <a href="{{ asset($dataBerita->file) }}">Download
                                                            the PDF</a>
                                                    </iframe>
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <a type="button" class="btn btn-secondary mt-3" href="{{ route('berita.index') }}">
                        <i class="mdi mdi-arrow-left me-2"></i> <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>

    </div> <!-- end container-fluid -->
@endsection

@push('js')
    <script>
        let successMessage = '{{ session('success') }}';
        if (successMessage !== '') {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: successMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endpush
