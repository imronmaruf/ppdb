<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-end">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/logo.png') }}" alt="">
            <h1 class="sitename">SDN 18 DEWANTARA</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ url('/') }}#tentang"
                        class="{{ Request::is('/') || Request::is('/') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ url('/') }}#fasilitas">Fasilitas</a></li>
                <li><a href="{{ url('/') }}#galeri">Galeri</a></li>
                <li><a href="{{ url('/') }}#kontak">Kontak</a></li>
                <li class="dropdown">
                    <a href="#"><span>Berita</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('berita.index') }}">Berita</a></li>
                        <li><a href="{{ route('berita.indexPengumuman') }}">Pengumuman</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        <a class="btn-getstarted" href="{{ route('login') }}">Masuk</a>
        {{-- <a class="btn-getstarted" href="{{ route('login') }}">Masuk</a> --}}


    </div>
</header>
