@extends('auth.layouts.main')

@push('title')
    Login
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
                        <div class="card-header pt-4 pb-4 text-center bg-success">
                            <a href="{{ route('login') }}">
                                <span><img src="{{ asset('admin/assets/img/logo.png') }}" alt="" height="50"></span>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Login</h4>
                                <p class="text-muted mb-4">Masukkan Email dan Password anda dengan benar!</p>
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

                            <form method="POST" action="{{ route('login') }}">
                                <div class="mb-3">
                                    @csrf

                                    <label for="email" class="form-label">ALamat Email</label>
                                    <input class="form-control" type="email" id="email"
                                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                        required autocomplete="email" autofocus placeholder="Enter your email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Lupa
                                                Password?</small></a>
                                    @endif
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="password"
                                        @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password" placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="checkbox-signin">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                <div class="d-grid mb-0 text-center">
                                    <button class="btn btn-success" type="submit"><i class="mdi mdi-login"></i>
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->



                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum Punya Akun? <a href="{{ route('register') }}"
                                    class="text-muted ms-1"><b>Register</b></a></p>
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
