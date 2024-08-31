@extends('admin.layouts.main')

@push('title')
    Data Siswa Diterima
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

                    <h4 class="page-title">Page &raquo; Siswa Diterima</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Data Siswa Diterima</h4>

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
                                                @foreach ($pesertaDiterima as $key => $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ ucfirst($data->jenis_kelamin) }}</td>
                                                        <td>{{ $data->ortu->nama_ayah ?? '-' }}</td>
                                                        <td>{{ $data->ortu->nama_ibu ?? '-' }}</td>
                                                        <td>{{ $data->wali->nama_wali ?? '-' }}</td>
                                                        <td>{{ $data->wali->no_telp ?? '-' }}</td>
                                                        <td>
                                                            <span class="badge bg-success">
                                                                {{ ucfirst($data->status) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('data-pendaftar.show', $data->id) }}"
                                                                type="button" class="btn btn-info btn-sm">
                                                                <i class="mdi mdi-eye text-white"></i>
                                                            </a>
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
