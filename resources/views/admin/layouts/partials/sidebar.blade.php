<div class="leftside-menu">
    {{-- LOGO --}}
    <a href="/dashboard" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('admin/assets/img/logo.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin/assets/img/logo-min.png') }}" alt="" height="35">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        {{-- Sidemenu --}}
        <ul class="side-nav">
            {{-- Master Section --}}
            <li class="side-nav-title side-nav-item">Master</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard.index') }}"
                    class="side-nav-link {{ Route::is('dashboard.*') ? 'active' : '' }}">
                    <i class="uil-home-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Admin Only Section --}}
            @can('admin-only')
                <li class="side-nav-item">
                    <a href="{{ route('ppdb-settings.index') }}"
                        class="side-nav-link {{ Route::is('ppdb-settings.index') ? 'active' : '' }}">
                        <i class="uil-calendar-alt"></i>
                        <span>Jadwal</span>
                    </a>
                </li>
            @endcan

            {{-- Student Only Section --}}
            @can('siswa-only')
                <li class="side-nav-title side-nav-item {{ Route::is('data-pendaftaran.*') ? 'menuitem-active' : '' }}">
                    Formulir Pendaftaran
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-pendaftaran.index') }}"
                        class="side-nav-link {{ Route::is('data-pendaftaran.index') || Route::is('data-pendaftaran.create') ? 'active' : '' }}">
                        <i class="uil-comments-alt"></i>
                        <span>Formulir Calon Siswa</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-ortu.index') }}"
                        class="side-nav-link {{ Route::is('data-ortu.index') ? 'active' : '' }}">
                        <i class="uil-users-alt"></i>
                        <span>Identitas Orang Tua</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-wali.index') }}"
                        class="side-nav-link {{ Route::is('data-wali.index') ? 'active' : '' }}">
                        <i class="uil-clipboard-alt"></i>
                        <span>Identitas Wali</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-berkas.index') }}"
                        class="side-nav-link {{ Route::is('data-berkas.index') ? 'active' : '' }}">
                        <i class="uil-clipboard-alt"></i>
                        <span>Berkas</span>
                    </a>
                </li>
            @endcan

            {{-- Admin Only Data Master Section --}}
            @can('admin-only')
                <li class="side-nav-title side-nav-item">Data Master</li>

                <li class="side-nav-item {{ Route::is('data-pendaftar.*') ? 'menuitem-active' : '' }}">
                    <a data-bs-toggle="collapse" href="#sidebarPendaftar" aria-expanded="false"
                        aria-controls="sidebarPendaftar" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Data Pendaftar</span>
                        <span class="badge bg-success float-end">{{ $jumlahPesertaVerifikasi }} baru</span>
                    </a>
                    <div class="collapse {{ Route::is('data-pendaftar.*') ? 'show' : '' }}" id="sidebarPendaftar">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('data-pendaftar.index') }}"
                                    class="{{ Route::is('data-pendaftar.index') ? 'active' : '' }}">
                                    Pendaftar
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('data-pendaftar.diterima') }}"
                                    class="{{ Route::is('data-pendaftar.diterima') ? 'active' : '' }}">
                                    Diterima
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-user.index') }}"
                        class="side-nav-link {{ Route::is('data-user.index') ? 'active' : '' }}">
                        <i class="uil-users-alt"></i>
                        <span>Data User</span>
                    </a>
                </li>

                {{-- Landing Page Content Section --}}
                <li class="side-nav-title side-nav-item">Konten Landing Page</li>

                <li
                    class="side-nav-item {{ Route::is('tentang-kontak.*') || Route::is('fasilitas.*') || Route::is('galeri.*') ? 'menuitem-active' : '' }}">
                    <a data-bs-toggle="collapse" href="#sidebarLanding" aria-expanded="false" aria-controls="sidebarLanding"
                        class="side-nav-link">
                        <i class="uil-monitor"></i>
                        <span>Landing Page</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse {{ Route::is('tentang-kontak.*') || Route::is('fasilitas.*') || Route::is('galeri.*') ? 'show' : '' }}"
                        id="sidebarLanding">
                        <ul class="side-nav-second-level">
                            <li class="{{ Route::is('tentang-kontak.*') ? 'menuitem-active' : '' }}">
                                <a href="{{ route('tentang-kontak.index') }}"
                                    class="{{ Route::is('tentang-kontak.*') ? 'active' : '' }}">
                                    Tentang & Kontak
                                </a>
                            </li>
                            <li class="{{ Route::is('fasilitas.*') ? 'menuitem-active' : '' }}">
                                <a href="{{ route('fasilitas.index') }}"
                                    class="{{ Route::is('fasilitas.*') ? 'active' : '' }}">
                                    Fasilitas
                                </a>
                            </li>
                            <li class="{{ Route::is('galeri.*') ? 'menuitem-active' : '' }}">
                                <a href="{{ route('galeri.index') }}" class="{{ Route::is('galeri.*') ? 'active' : '' }}">
                                    Galeri
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- News Section --}}
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarBerita" aria-expanded="false" aria-controls="sidebarBerita"
                        class="side-nav-link {{ Route::is('kategori-berita.*') || Route::is('data-berita.*') ? 'menuitem-active' : '' }}">
                        <i class="uil-newspaper"></i>
                        <span>Berita</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse {{ Route::is('kategori-berita.*') || Route::is('data-berita.*') ? 'show' : '' }}"
                        id="sidebarBerita">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('kategori-berita.index') }}"
                                    class="{{ Route::is('kategori-berita.index') ? 'active' : '' }}">
                                    Kategori Berita
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('data-berita.index') }}"
                                    class="{{ Route::is('data-berita.index') ? 'active' : '' }}">
                                    Daftar Berita
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('data-berita.create') }}"
                                    class="{{ Route::is('data-berita.create') ? 'active' : '' }}">
                                    Buat Berita
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan

            {{-- Principal Only Section --}}
            @can('kepsek-only')
                <li class="side-nav-item">
                    <a href="{{ route('kepsek-data-pendaftar.index') }}"
                        class="side-nav-link {{ Route::is('kepsek-data-pendaftar.index') ? 'active' : '' }}">
                        <i class="uil-clipboard-alt"></i>
                        <span>Laporan Pendaftar</span>
                    </a>
                </li>
            @endcan
        </ul>

        <div class="clearfix"></div>
    </div>
</div>
