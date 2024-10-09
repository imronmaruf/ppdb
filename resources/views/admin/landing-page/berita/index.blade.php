@extends('admin.layouts.main')

@push('title')
    Dashboard {{ ucfirst(Auth::user()->role ?? '') }} | Berita
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
                    <h4 class="page-title">Page &raquo; Data Berita</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="header-title mb-3">Data Berita</h4>
                            <a type="button" class="btn btn-info" href="{{ route('berita.create') }}">
                                <i class="mdi mdi-plus me-2"></i> <span>Buat Data</span>
                            </a>
                        </div>

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
                                                    <th>Judul</th>
                                                    <th>Kategori</th>
                                                    <th>Gambar</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataBerita as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->judul }}</td>
                                                        <td>{{ $data->kategoriBerita->name }}</td>
                                                        <td><img src="{{ $data->gambar }}" alt="gambar" class="img-fluid"
                                                                style="width: 300px"></td>
                                                        <td>
                                                            @if ($data->status == 'draft')
                                                                <h5><span
                                                                        class="badge bg-warning">{{ ucfirst($data->status) }}</span>
                                                                </h5>
                                                            @else
                                                                <h5><span
                                                                        class="badge bg-success">{{ ucfirst($data->status) }}</span>
                                                                </h5>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">

                                                                <!-- Show Button -->
                                                                <a href="{{ route('berita.show', $data->id) }}"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="mdi mdi-eye text-white"></i>
                                                                </a>

                                                                <a href="{{ route('berita.edit', $data->id) }}"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="mdi mdi-pencil text-white"></i>
                                                                </a>
                                                                <!-- Delete Button -->
                                                                <form action="{{ route('berita.destroy', $data->id) }}"
                                                                    method="POST" id="deleteForm{{ $data->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm me-2"
                                                                        onclick="confirmDelete('{{ $data->id }}')">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </form>

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
    <script src="{{ asset('admin/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('admin/assets/js/pages/demo.datatable-init.js') }}"></script>
    <!-- end demo js-->

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Konfirmasi Penghapusan',
                text: 'Data akan dihapus Permanen. Yakin ingin menghapus data?',
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

        // ALert SUkses
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
