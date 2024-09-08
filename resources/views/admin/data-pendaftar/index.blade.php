@extends('admin.layouts.main')

@push('title')
    Dashboard {{ ucfirst(Auth::user()->role ?? '') }} | Data Pendaftar
@endpush



@push('css')
    <!-- third party css -->
    <link href="{{ asset('admin/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Page &raquo; Data Pendaftar</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Data Peserta PPDB</h4>

                        <div class="tab-content">
                            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="basic-datatable"
                                            class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed"
                                            role="grid" aria-describedby="basic-datatable_info"
                                            style="position: relative; width: 1070px;">
                                            <thead>
                                                <tr role="row">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Nama Ayah</th>
                                                    <th>Nama Ibu</th>
                                                    <th>Nama Wali</th>
                                                    <th>No. Hp Wali</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesertaPpdb as $key => $peserta)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $peserta->name }}</td>
                                                        <td>{{ ucfirst($peserta->jenis_kelamin) }}</td>
                                                        <td>{{ $peserta->ortu->nama_ayah ?? '-' }}</td>
                                                        <td>{{ $peserta->ortu->nama_ibu ?? '-' }}</td>
                                                        <td>{{ $peserta->wali->nama_wali ?? '-' }}</td>
                                                        <td>{{ $peserta->wali->no_telp ?? '-' }}</td>
                                                        <td>
                                                            @if (is_null($peserta->ortu) || is_null($peserta->wali) || is_null($peserta->berkas))
                                                                <span class="badge bg-danger">Peserta Belum Melengkapi
                                                                    Data</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-{{ $peserta->status === 'diterima' ? 'success' : ($peserta->status === 'ditolak' ? 'danger' : 'warning') }}">
                                                                    {{ ucfirst($peserta->status) }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-between">
                                                                <!-- Delete Button -->
                                                                <form
                                                                    action="{{ route('data-pendaftar.destroy', $peserta->id) }}"
                                                                    method="POST" id="deleteForm{{ $peserta->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        onclick="confirmDelete('{{ $peserta->id }}')">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </form>

                                                                <!-- View Button -->
                                                                <a href="{{ route('data-pendaftar.show', $peserta->id) }}"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="mdi mdi-eye text-white"></i>
                                                                </a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
@push('js')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Konfirmasi Penghapusan',
                text: 'Data akan dihapus dari tabel identitas calon siswa, wali, orang tua, dan berkas. Yakin ingin menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }

        // Show success message if present
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
    </script>


    <script src="{{ asset('admin/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/buttons.print.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('admin/assets/js/pages/demo.datatable-init.js') }}"></script>
    <!-- end demo js-->
@endpush
