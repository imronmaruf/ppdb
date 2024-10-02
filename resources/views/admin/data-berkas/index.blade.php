@extends('admin.layouts.main')

@push('title')
    Unggah Berkas
@endpush

@push('css')
    <style>
        .pdf-viewer {
            width: 100%;
            height: 500px;
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
                    <h4 class="page-title">Page &raquo; Form Upload Berkas</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="header-title">Data Berkas</h4>
                            <div>
                                <div>
                                    @if (!$dataBerkas)
                                        <!-- Tombol Tambah Data jika data belum ada sama sekali -->
                                        <a type="button" class="btn btn-info" href="{{ route('data-berkas.create') }}">
                                            <i class="mdi mdi-plus me-2"></i> <span>Tambah Data</span>
                                        </a>
                                    @elseif ($dataBerkas && $dataBerkas->isIncomplete())
                                        <!-- Tombol Edit Data dan Lengkapi Data jika data ada namun belum lengkap -->
                                        <a type="button" class="btn btn-warning me-2"
                                            href="{{ route('data-berkas.edit', $dataBerkas->id) }}">
                                            <i class="mdi mdi-pencil"></i> <span>Edit Data</span>
                                        </a>
                                        <a type="button" class="btn btn-info"
                                            href="{{ route('data-berkas.lengkapi', $dataBerkas->id) }}">
                                            <i class="mdi mdi-plus me-2"></i> <span>Lengkapi Berkas</span>
                                        </a>
                                    @else
                                        <!-- Tombol Edit Data jika data sudah lengkap -->
                                        <a type="button" class="btn btn-warning me-2"
                                            href="{{ route('data-berkas.edit', $dataBerkas->id) }}">
                                            <i class="mdi mdi-pencil"></i> <span>Edit Data</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($dataBerkas)
                            <h4 class="header-title">D. Berkas Pendaftaran</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <th scope="col">Akte Kelahiran</th>
                                            {{-- <td>{{ $dataBerkas->akte_kelahiran }}</td> --}}
                                            <td>
                                                @if ($dataBerkas && $dataBerkas->akte_kelahiran)
                                                    <a href="{{ asset($dataBerkas->akte_kelahiran) }}"
                                                        download="{{ $dataBerkas->akte_kelahiran }}" target="_blank">
                                                        <span class="text-primary text-decoration-underline">Download</span>
                                                    </a>
                                                    <br>
                                                    <iframe src="{{ asset($dataBerkas->akte_kelahiran) }}"
                                                        class="pdf-viewer mt-2" frameborder="0">
                                                        Your browser does not support PDFs.
                                                        <a href="{{ asset($dataBerkas->akte_kelahiran) }}">Download
                                                            the PDF</a>
                                                    </iframe>
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kartu Keluarga</th>
                                            {{-- <td>{{ $dataBerkas->kk }}</td> --}}
                                            <td>
                                                @if ($dataBerkas && $dataBerkas->kk)
                                                    <a href="{{ asset($dataBerkas->kk) }}" download="{{ $dataBerkas->kk }}"
                                                        target="_blank">
                                                        <span class="text-primary text-decoration-underline">Download</span>
                                                    </a>
                                                    <br>
                                                    <iframe src="{{ asset($dataBerkas->kk) }}" class="pdf-viewer mt-2"
                                                        frameborder="0">
                                                        Your browser does not support PDFs.
                                                        <a href="{{ asset($dataBerkas->kk) }}">Download
                                                            the PDF</a>
                                                    </iframe>
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">KTP Orang Tua / Wali</th>
                                            {{-- <td>{{ $dataBerkas->ktp_ortu }}</td> --}}
                                            <td>
                                                @if ($dataBerkas && $dataBerkas->ktp_ortu)
                                                    <a href="{{ asset($dataBerkas->ktp_ortu) }}"
                                                        download="{{ $dataBerkas->ktp_ortu }}" target="_blank">
                                                        <span class="text-primary text-decoration-underline">Download</span>
                                                    </a>
                                                    <br>
                                                    <iframe src="{{ asset($dataBerkas->ktp_ortu) }}"
                                                        class="pdf-viewer mt-2" frameborder="0">
                                                        Your browser does not support PDFs.
                                                        <a href="{{ asset($dataBerkas->ktp_ortu) }}">Download
                                                            the PDF</a>
                                                    </iframe>
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ijazah</th>
                                            <td>
                                                @if ($dataBerkas && $dataBerkas->ijazah)
                                                    <a href="{{ asset($dataBerkas->ijazah) }}"
                                                        download="{{ $dataBerkas->ijazah }}" target="_blank">
                                                        <span class="text-primary text-decoration-underline">Download</span>
                                                    </a>
                                                    <br>
                                                    <iframe src="{{ asset($dataBerkas->ijazah) }}" class="pdf-viewer mt-2"
                                                        frameborder="0">
                                                        Your browser does not support PDFs.
                                                        <a href="{{ asset($dataBerkas->ijazah) }}">Download the PDF</a>
                                                    </iframe>
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kartu PKH</th>
                                            {{-- <td>{{ $dataBerkas->kartu_pkh }}</td> --}}
                                            <td>
                                                @if ($dataBerkas && $dataBerkas->kartu_pkh)
                                                    <a href="{{ asset($dataBerkas->kartu_pkh) }}"
                                                        download="{{ $dataBerkas->kartu_pkh }}" target="_blank">
                                                        <span class="text-primary text-decoration-underline">Download</span>
                                                    </a>
                                                    <br>
                                                    <iframe src="{{ asset($dataBerkas->kartu_pkh) }}"
                                                        class="pdf-viewer mt-2" frameborder="0">
                                                        Your browser does not support PDFs.
                                                        <a href="{{ asset($dataBerkas->kartu_pkh) }}">Download the PDF</a>
                                                    </iframe>
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pas Foto</th>
                                            <td>
                                                @if ($dataBerkas->pas_foto)
                                                    <img src="{{ $dataBerkas->pas_foto }}" alt="Pas Foto" class="img-fluid"
                                                        style="width: 300px">
                                                @else
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0 table-bordered table-striped">
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">Berkas Belum Ditambahkan</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div> <!-- end col -->
                            </div>
                        @endif

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
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
