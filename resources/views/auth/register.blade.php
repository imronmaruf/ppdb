@extends('auth.layouts.main')

@push('title')
    Registrasi
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
                            <a href="{{ route('login') }}">
                                <span><img src="{{ asset('admin/assets/img/logo.png') }}" alt="" height="50"></span>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="mt-0">{{ __('Register') }}</h4>
                                <p class="text-muted mb-4">Sebelum melakukan pendaftaran, silahkan registrasi akun terlebih
                                    dahulu.</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                    role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>Error - </strong>{{ $error }}
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="name"
                                        @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                        required autocomplete="name" autofocus placeholder="Masukkan nama lengkap">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input class="form-control" type="email" id="email"
                                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                        required autocomplete="email" placeholder="Masukkan email anda">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="password"
                                        @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="new-password" placeholder="Masukkan password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                    <input class="form-control" type="password" id="password-confirm"
                                        @error('password') is-invalid @enderror" name="password_confirmation" required
                                        autocomplete="new-password" placeholder="Enter your password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-0 d-grid text-center">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-circle"></i>
                                        {{ __('Registrasi') }}
                                    </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Sudah Punya Akun? <a href="{{ route('login') }}"
                                    class="text-muted ms-1"><b>Login</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

@endsection
