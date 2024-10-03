@extends('admin.layouts.main')

@push('title')
    Dashboard {{ Auth::user()->role ?? '' }}
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
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="header-title mb-0">Data Peserta PPDB </h4>

                            <!-- Filter Form -->
                            <div class="d-flex gap-2">
                                <button id="filterCetakButton" class="btn btn-primary">
                                    <i class="mdi mdi-printer me-1"></i> <span>Filter & Cetak PDF</span>
                                </button>

                                <button id="filterExportExcel" class="btn btn-outline-success">
                                    <i class="mdi mdi-microsoft-excel me-1"></i> <span>Export Excel</span>
                                </button>

                                <form method="GET" action="{{ route('kepsek.data-pendaftar') }}" id="filterForm"
                                    class="d-flex gap-2">
                                    <div class="form-group">
                                        <input type="number" name="tahun" class="form-control"
                                            value="{{ request('tahun', now()->year) }}" placeholder="Filter Tahun">
                                    </div>

                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="">----Pilih Status----</option>
                                            <option value="verifikasi"
                                                {{ request('status') == 'verifikasi' ? 'selected' : '' }}>Verifikasi
                                            </option>
                                            <option value="diterima"
                                                {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
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
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>No. Handphone</th>
                                                    <th>Nama Ayah</th>
                                                    <th>Nama Ibu</th>
                                                    <th>Nama Wali</th>
                                                    <th>Tahun</th>
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
                                                        <td>{{ $peserta->no_telp }}</td>
                                                        <td>{{ $peserta->ortu->nama_ayah ?? '-' }}</td>
                                                        <td>{{ $peserta->ortu->nama_ibu ?? '-' }}</td>
                                                        <td>{{ $peserta->wali->nama_wali ?? '-' }}</td>
                                                        <td>{{ $peserta->created_at ? $peserta->created_at->format('Y') : '' }}
                                                        </td>

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
                                                            <a href="{{ route('kepsek-data-pendaftar.show', $peserta->id) }}"
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


    <script>
        document.getElementById('filterCetakButton').addEventListener('click', function() {
            // Get the values of the filter form
            var tahun = document.querySelector('input[name="tahun"]').value;
            var status = document.querySelector('select[name="status"]').value;
            // Build the URL for PDF generation with filter parameters
            var cetakUrl = "{{ route('kepsek.cetakLaporan') }}";
            var urlParams = new URLSearchParams();
            if (tahun) {
                urlParams.append('tahun', tahun);
            }
            if (status) {
                urlParams.append('status', status);
            }
            // Open the PDF generation URL in a new tab
            window.open(cetakUrl + '?' + urlParams.toString(), '_blank');
        });

        document.getElementById('filterExportExcel').addEventListener('click', function() {
            var tahun = document.querySelector('input[name="tahun"]').value;
            var status = document.querySelector('select[name="status"]').value;

            var exportUrl = "{{ route('kepsek.exportExcel') }}";
            var urlParams = new URLSearchParams();
            if (tahun) {
                urlParams.append('tahun', tahun);
            }
            if (status) {
                urlParams.append('status', status);
            }
            window.location.href = exportUrl + '?' + urlParams.toString();
        });
    </script>
@endpush
