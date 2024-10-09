@extends('admin.layouts.main')

@push('title')
    Dashboard {{ ucfirst(Auth::user()->role ?? '') }} | Fasilitas
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Page &raquo; Fasilitas</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="header-title">Data Landing Page Fasilitas</h4>
                            <div>
                                <!-- Tombol Tambah Data jika data belum ada -->
                                <a type="button" class="btn btn-info" href="{{ route('fasilitas.create') }}">
                                    <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                </a>
                            </div>
                        </div>
                        @if ($dataFasilitas->count())
                            <form id="delete-selected-form" action="{{ route('fasilitas.delete.selected') }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <h4 class="header-title mt-3">Foto</h4>
                                    @foreach ($dataFasilitas as $fasilitas)
                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div class="card text-center">
                                                <div class="position-relative">
                                                    <img src="{{ asset($fasilitas->foto_url) }}"
                                                        class="card-img-top img-fluid rounded-2" alt="fasilitas">
                                                    <input type="checkbox" name="selected_files[]"
                                                        value="{{ $fasilitas->id }}"
                                                        class="position-absolute top-0 end-0 m-2 bg-white"
                                                        style="cursor: pointer;">
                                                    <p class="card-text m-2 "><strong>{{ $fasilitas->name }}</strong></p>
                                                </div>
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
                                                <span class="badge bg-warning text-dark">Data Fasilitas belum
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('delete-button').addEventListener('click', function(event) {
            const checkboxes = document.querySelectorAll('input[name="selected_files[]"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: 'Tidak ada foto yang dipilih.',
                });
            }
        });

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
