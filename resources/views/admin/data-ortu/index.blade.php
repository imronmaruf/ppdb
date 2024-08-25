@extends('admin.layouts.main')

@push('title')
    Dashboard {{ Auth::user()->role ?? '' }}
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Analytics</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Input Types</h4>
                        <p class="text-muted font-14">
                            Most common form control, text-based input fields. Includes support for all HTML5 types:
                            <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>,
                            <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>,
                            <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>,
                            <code>tel</code>, and <code>color</code>.
                        </p>


                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table mb-0 table-bordered table-striped">

                                    <tr>
                                        <th scope="col">Nama Ayah</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Tempat Tanggal Lahir Ayah</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">NIK Ayah</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Pendidikan Ayah</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Pekerjaan Ayah</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Alamat Ayah</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Nama Ibu</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Tempat Tanggal Lahir Ibu</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">NIK Ibu</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Pendidikan Ibu</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Pekerjaan Ibu</th>
                                        <td>Cell</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Alamat Ibu</th>
                                        <td>Cell</td>
                                    </tr>


                                </table>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>

    </div>
@endsection
