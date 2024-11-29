@extends('auth.layouts.main')

@push('title')
    Reset Password
@endpush

@push('css')
@endpush
@section('content')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="{{ asset('admin/assets/img/logo.png') }}" alt="" height="50"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Reset Password</h4>
                                <p class="text-muted mb-4">Masukkan alamat email Anda dan kami akan mengirimkan email kepada
                                    Anda
                                    instruksi untuk mengatur ulang kata sandi Anda.</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" autocomplete="email"
                                        autofocus value="{{ old('email') }}" placeholder="Masukkan email dengan  benar">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-0 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kirim Tautan Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                        <div class="row mb-2">
                            <div class="col-12 text-center">
                                <p class="text-muted">Kembali &raquo; <a href="{{ route('login') }}"
                                        class="text-muted ms-1"><b>Masuk</b></a></p>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2024 © PPDB - SD N 18 Dewantara
    </footer>
@endsection
