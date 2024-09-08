<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}">

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    {{-- <link href="{{ asset('admin/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" /> --}}
    @stack('css')
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    @yield('content')

    <!-- end auth-fluid-->

    <!-- bundle -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    @stack('js')

</body>

</html>
