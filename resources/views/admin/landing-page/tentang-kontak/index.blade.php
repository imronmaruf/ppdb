@extends('admin.layouts.main')

@push('title')
    Dashboard {{ ucfirst(Auth::user()->role ?? '') }} | Tentang & Kontak
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
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="header-title">Data Landing Page Tentang & Kontak</h4>
                            <div>

                                @if ($dataTentangKontak)
                                    <!-- Tombol Edit Data jika data sudah ada -->
                                    <a type="button" class="btn btn-warning me-2"
                                        href="{{ route('tentang-kontak.edit', $dataTentangKontak->id) }}">
                                        <i class="mdi mdi-pencil"></i> <span>Edit Data</span>
                                    </a>
                                @else
                                    <!-- Tombol Tambah Data jika data belum ada -->
                                    <a type="button" class="btn btn-info" href="{{ route('tentang-kontak.create') }}">
                                        <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if ($dataTentangKontak)
                            <div class="row">
                                <h4 class="header-title mt-3">Tentang</h4>
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col" class="w-25">Konten</th>
                                            <td>{{ $dataTentangKontak->konten_tentang }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="w-25">Gambar</th>
                                            <td>{{ $dataTentangKontak->foto }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <h4 class="header-title mt-3">Kontak</h4>
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col" class="w-25">Alamat</th>
                                            <td>{{ $dataTentangKontak->alamat }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="w-25">No. Telp / WA</th>
                                            <td>{{ $dataTentangKontak->no_telp }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="w-25">WA Link</th>
                                            <td>{{ $dataTentangKontak->wa_link }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">Data Tentang & Kontak Belum
                                                    ditambahkan</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                        @endif



                    </div>
                    <!-- end row -->



                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    </div>
@endsection
@push('js')
    <script>
        let successMessage = '{{ session('success') }}';
        if (successMessage) {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: successMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }

        let errorMessage = '{{ session('error') }}';
        if (errorMessage) {
            Swal.fire({
                icon: "error",
                title: "Ooops!",
                text: errorMessage,
                showConfirmButton: true,
            });
        }
    </script>
@endpush
