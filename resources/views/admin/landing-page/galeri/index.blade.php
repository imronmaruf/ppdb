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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th><input type="checkbox" id="select-all" class="form-check-input"></th>
                                                <th>Foto</th>
                                                <th>Judul</th>
                                                <th>Caption</th>
                                                <th>Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Kategori Akademik -->
                                            <tr>
                                                <td><input type="checkbox" id="select-akademik" class="form-check-input">
                                                </td>
                                                <td colspan="5"><strong>Akademik</strong></td>
                                            </tr>
                                            @foreach ($dataGaleriAkademik as $galeri)
                                                <tr class="akademik-row">
                                                    <td><input type="checkbox" name="selected_files[]"
                                                            value="{{ $galeri->id }}" class="form-check-input"></td>
                                                    <td><img src="{{ asset($galeri->foto_url) }}"
                                                            class="img-fluid rounded-2" style="max-width: 200px;"
                                                            alt="Foto"></td>
                                                    <td>{{ $galeri->title }}</td>
                                                    <td>{!! Str::words($galeri->caption, 30, '...') !!}</td>
                                                    <td>{{ $galeri->kategori }}</td>
                                                </tr>
                                            @endforeach

                                            <!-- Kategori Non-Akademik -->
                                            <tr>
                                                <td><input type="checkbox" id="select-non-akademik"
                                                        class="form-check-input"></td>
                                                <td colspan="5"><strong>Non-Akademik</strong></td>
                                            </tr>
                                            @foreach ($dataGaleriNonAkademik as $galeri)
                                                <tr class="non-akademik-row">
                                                    <td><input type="checkbox" name="selected_files[]"
                                                            value="{{ $galeri->id }}" class="form-check-input"></td>
                                                    <td><img src="{{ asset($galeri->foto_url) }}"
                                                            class="img-fluid rounded-2" style="max-width: 200px;"
                                                            alt="Foto"></td>
                                                    <td>{{ $galeri->title }}</td>
                                                    <td>{!! Str::words($galeri->caption, 30, '...') !!}</td>
                                                    <td>{{ $galeri->kategori }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // JavaScript untuk memilih semua checkbox di tabel
        document.getElementById('select-all').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('input[name="selected_files[]"]').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });

        // JavaScript untuk memilih semua checkbox dalam kategori Akademik
        document.getElementById('select-akademik').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.akademik-row input[name="selected_files[]"]').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });

        // JavaScript untuk memilih semua checkbox dalam kategori Non-Akademik
        document.getElementById('select-non-akademik').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.non-akademik-row input[name="selected_files[]"]').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });

        // JavaScript untuk menangani tombol hapus
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

        // JavaScript untuk menampilkan notifikasi sukses
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
