@extends('admin.layouts.main')

@push('title')
    Admin | Pengaturan Jadwal
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Start Page Title -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="page-title-box">
                    <h4 class="page-title">Page &raquo; Pengaturan Jadwal PPDB</h4>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <h3 class="text-uppercase">Pengaturan PPDB</h3>

                        <p>
                            Periode: <strong>{{ date('d-m-Y', strtotime($setting->tanggal_mulai)) }} Sampai dengan
                                {{ date('d-m-Y', strtotime($setting->tanggal_akhir)) }}</strong>
                        </p>

                        <form action="{{ route('ppdb-settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai<span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                            value="{{ old('tanggal_mulai', $setting->tanggal_mulai ?? '') }}" required>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir<span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                                            value="{{ old('tanggal_akhir', $setting->tanggal_akhir ?? '') }}" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                        </form>

                        <hr>

                        <h3>Status Pendaftaran</h3>
                        <p>Status saat ini: <strong>{{ $setting->is_open ? 'Dibuka' : 'Ditutup' }}</strong></p>

                        <form action="{{ route('ppdb-settings.toggle') }}" method="POST">
                            @csrf
                            <input type="checkbox" id="switch3" name="is_open" value="1"
                                {{ $setting->is_open ? 'checked' : '' }} data-switch="success"
                                onchange="this.form.submit()">
                            <label for="switch3" data-on-label="Buka" data-off-label="Tutup"></label>
                        </form>

                    </div> <!-- End Card Body -->
                </div> <!-- End Card -->
            </div> <!-- End Col -->
        </div>
    </div>
@endsection

@push('js')
    <script>
        // SweetAlert untuk konfirmasi simpan pengaturan
        document.querySelector('form[action="{{ route('ppdb-settings.update') }}"]').addEventListener('submit', function(
            event) {
            event.preventDefault(); // Cegah form langsung disubmit
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Simpan perubahan pengaturan PPDB!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit form jika konfirmasi OK
                }
            });
        });

        // SweetAlert untuk konfirmasi perubahan toggle status
        document.querySelector('input[name="is_open"]').addEventListener('click', function(event) {
            const checkbox = this; // Simpan referensi ke checkbox
            event.preventDefault(); // Cegah perubahan langsung terjadi
            const toggleStatus = this.checked ? "Buka Pendaftaran!" : "Tutup Pendaftaran!";

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: toggleStatus,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah!'
            }).then((result) => {
                if (result.isConfirmed) {
                    checkbox.checked = !checkbox.checked; // Ubah status checkbox
                    checkbox.form.submit(); // Submit form jika konfirmasi OK
                } else {
                    checkbox.checked = !checkbox.checked; // Kembalikan toggle jika tidak dikonfirmasi
                }
            });
        });

        // Alert Sukses dan Error
        let successMessage = '{{ session('success') }}';
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }

        let errorMessage = '{{ session('error') }}';
        if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endpush
