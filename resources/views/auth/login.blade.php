@extends('auth.layouts.main')

@push('title')
    Login
@endpush

@push('css')
@endpush
@section('content')
    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        {{-- <a href="/login" class="logo-dark">
                            <span><img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt=""
                                    height="18"></span>
                        </a>
                        <a href="/login" class="logo-light">
                            <span><img src="{{ asset('admin/assets/images/logo.png') }}" alt=""
                                    height="18"></span>
                        </a> --}}
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">{{ __('Login') }}</h4>
                    <p class="text-muted mb-4">Masukkan Email dan Password anda dengan benar!</p>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                            role="alert">
                            @foreach ($errors->all() as $error)
                                <strong>Error - </strong>{{ $error }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        <div class="mb-3">
                            @csrf

                            <label for="email" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="email" @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Enter your email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your
                                        password?</small></a>
                            @endif
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" id="password"
                                @error('password') is-invalid @enderror" name="password" autocomplete="current-password"
                                placeholder="Enter your password">
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
                                <label class="form-check-label" for="checkbox-signin">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i>
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt">
                        <p class="text-muted">Don't have an account? <a href="{{ route('register') }}"
                                class="text-muted ms-1"><b>Sign Up</b></a></p>
                    </footer>

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">I love the color!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very
                    much! . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - Hyper Admin User
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
@endsection
