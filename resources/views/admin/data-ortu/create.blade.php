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
                            <div class="col-lg-6">
                                <form>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Text</label>
                                        <input type="text" id="simpleinput" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="example-email" class="form-control"
                                            placeholder="Email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Password</label>
                                        <input type="password" id="example-password" class="form-control" value="password">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Show/Hide Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-palaceholder" class="form-label">Placeholder</label>
                                        <input type="text" id="example-palaceholder" class="form-control"
                                            placeholder="placeholder">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Text area</label>
                                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-readonly" class="form-label">Readonly</label>
                                        <input type="text" id="example-readonly" class="form-control" readonly=""
                                            value="Readonly value">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-disable" class="form-label">Disabled</label>
                                        <input type="text" class="form-control" id="example-disable" disabled=""
                                            value="Disabled value">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-static" class="form-label">Static control</label>
                                        <input type="text" readonly="" class="form-control-plaintext"
                                            id="example-static" value="email@example.com">
                                    </div>

                                    <div class="mb-0">
                                        <label for="example-helping" class="form-label">Helping text</label>
                                        <input type="text" id="example-helping" class="form-control"
                                            placeholder="Helping text">
                                        <span class="help-block"><small>A block of help text that breaks onto a new
                                                line and may extend beyond one line.</small></span>
                                    </div>

                                </form>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <form>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Input Select</label>
                                        <select class="form-select" id="example-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-multiselect" class="form-label">Multiple
                                            Select</label>
                                        <select id="example-multiselect" multiple="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Default file
                                            input</label>
                                        <input type="file" id="example-fileinput" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-date" class="form-label">Date</label>
                                        <input class="form-control" id="example-date" type="date" name="date">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-month" class="form-label">Month</label>
                                        <input class="form-control" id="example-month" type="month" name="month">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-time" class="form-label">Time</label>
                                        <input class="form-control" id="example-time" type="time" name="time">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-week" class="form-label">Week</label>
                                        <input class="form-control" id="example-week" type="week" name="week">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-number" class="form-label">Number</label>
                                        <input class="form-control" id="example-number" type="number" name="number">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-color" class="form-label">Color</label>
                                        <input class="form-control" id="example-color" type="color" name="color"
                                            value="#727cf5">
                                    </div>

                                    <div class="mb-0">
                                        <label for="example-range" class="form-label">Range</label>
                                        <input class="form-range" id="example-range" type="range" name="range"
                                            min="0" max="100">
                                    </div>

                                </form>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>

    </div>
@endsection
