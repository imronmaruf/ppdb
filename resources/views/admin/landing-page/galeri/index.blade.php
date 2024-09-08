@extends('admin.layouts.main')

@push('title')
    Dashboard {{ ucfirst(Auth::user()->role ?? '') }} | Galeri
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Page &raquo; Galeri</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="header-title">Data Landing Page Galeri</h4>
                            <div>
                                <!-- Tombol Tambah Data jika data belum ada -->
                                <a type="button" class="btn btn-info" href="{{ route('galeri.create') }}">
                                    <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                </a>
                            </div>
                        </div>
                        @if ($dataGaleriAkademik->count() || $dataGaleriNonAkademik->count())
                            <form id="delete-selected-form" action="{{ route('galeri.delete.selected') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <!-- Kategori Akademik -->
                                    <h4 class="header-title mt-3">Akademik</h4>
                                    @foreach ($dataGaleriAkademik as $galeri)
                                        <div class="col-lg-2 col-md-3 col-sm-4 mb-3">
                                            <div class="position-relative">
                                                <img src="{{ asset($galeri->foto_url) }}" class="img-fluid rounded-2"
                                                    alt="{{ $galeri->kategori }}">
                                                <input type="checkbox" name="selected_files[]" value="{{ $galeri->id }}"
                                                    class="position-absolute top-0 end-0 m-2 bg-white"
                                                    style="cursor: pointer;">

                                                <label for=""> {{ $galeri->kategori }}</label>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Kategori Non-Akademik -->
                                    <h4 class="header-title mt-3">Non-Akademik</h4>
                                    @foreach ($dataGaleriNonAkademik as $galeri)
                                        <div class="col-lg-2 col-md-3 col-sm-4 mb-3">
                                            <div class="position-relative">
                                                <img src="{{ asset($galeri->foto_url) }}" class="img-fluid rounded-2"
                                                    alt="{{ $galeri->judul }}">
                                                <input type="checkbox" name="selected_files[]" value="{{ $galeri->id }}"
                                                    class="position-absolute top-0 end-0 m-2 bg-white"
                                                    style="cursor: pointer;">

                                                <label for=""> {{ $galeri->kategori }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" id="delete-button" class="btn btn-danger mt-3">Hapus
                                    Terpilih</button>
                            </form>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">Data Galeri belum
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
@endsection

@push('js')
    <script>
        document.getElementById('delete-button').addEventListener('click', function(event) {
            // Cek apakah ada checkbox yang terpilih
            const checkboxes = document.querySelectorAll('input[name="selected_files[]"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault(); // Mencegah form dari pengiriman
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: 'Tidak ada foto yang dipilih.',
                });
            }
        });

        // Cek apakah ada pesan sukses di session
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
@endpush
