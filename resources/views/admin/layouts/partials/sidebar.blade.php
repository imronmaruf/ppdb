<div class="leftside-menu">
    <!-- LOGO -->
    <a href="/dashboard" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('admin/assets/img/logo.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin/assets/img/logo-min.png') }}" alt="" height="35">
        </span>
    </a>


    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Master</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            @can('siswa-only')
                <li class="side-nav-title side-nav-item">Formulir Pendaftaran</li>

                <li class="side-nav-item">
                    <a href="{{ route('data-pendaftaran.index') }}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Formulir Calon Siswa </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-ortu.index') }}" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span>Identitas Orang Tua</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-wali.index') }}" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Identitas Wali</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-berkas.index') }}" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Berkas</span>
                    </a>
                </li>
            @endcan

            @can('admin-only')
                <li class="side-nav-title side-nav-item">Data Master</li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPendaftar" aria-expanded="false"
                        aria-controls="sidebarPendaftar" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span> Data Pendaftar</span>
                        <span class="badge bg-success float-end">{{ $jumlahPesertaVerifikasi }} baru </span>
                    </a>
                    <div class="collapse" id="sidebarPendaftar">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('data-pendaftar.index') }}">Pendaftar</a>
                            </li>
                            <li>
                                <a href="{{ route('data-pendaftar.diterima') }}">Diterima</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-user.index') }}" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> Data User </span>
                    </a>
                </li>

                <li class="side-nav-title side-nav-item">Konten Landing Page</li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLanding" aria-expanded="false" aria-controls="sidebarLanding"
                        class="side-nav-link">
                        <i class="uil-monitor"></i>
                        <span> Landing Page </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarLanding">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('tentang-kontak.index') }}">Tentang & Kontak</a>
                            </li>
                            <li>
                                <a href="{{ route('fasilitas.index') }}">Fasilitas</a>
                            </li>
                            <li>
                                <a href="{{ route('galeri.index') }}">Galeri</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarBerita" aria-expanded="false" aria-controls="sidebarBerita"
                        class="side-nav-link">
                        <i class="uil-newspaper"></i>
                        <span> Berita </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBerita">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('kategori-berita.index') }}">Kategori Berita</a>
                            </li>
                            <li>
                                <a href="{{ route('berita.index') }}">Daftar Berita</a>
                            </li>
                            <li>
                                <a href="{{ route('berita.create') }}">Buat Berita</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan


            @can('kepsek-only')
                <li class="side-nav-item">
                    <a href="{{ route('kepsek-data-pendaftar.index') }}" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Laporan Pendaftar </span>
                    </a>
                </li>
            @endcan
            <!-- End Sidebar -->

            <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
