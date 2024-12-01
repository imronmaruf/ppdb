@extends('landing.layouts.main')

@push('title')
    PPDB SD N 18 DEWANTARA
@endpush

@push('css')
    <link href="{{ asset('landing/assets/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/css/banner.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('assets/img/img3.jpg') }}" alt="" data-aos="fade-in">
        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Selamat Datang di SD Negeri 18 Dewantara</h2>
                    <p>Ayo Kita Belajar Bersama</p>

                    @if ($ppdbSetting && $ppdbSetting->is_open)
                        <p>Ditutup pada: {{ date('d-m-Y', strtotime($ppdbSetting->tanggal_akhir)) }}</p>
                        <a href="{{ route('register') }}" class="btn-get-started">Daftar Sekarang</a>
                    @elseif ($ppdbSetting)
                        <p>Saat ini pendaftaran sedang ditutup, akan dibuka pada :</p>
                        <p><strong>Mulai:</strong> {{ date('d-m-Y', strtotime($ppdbSetting->tanggal_mulai)) }}</p>
                        <p><strong>Akhir:</strong> {{ date('d-m-Y', strtotime($ppdbSetting->tanggal_akhir)) }}</p>
                    @else
                        <p>Informasi pendaftaran PPDB belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up"
                    data-aos-delay="200">
                    <img src="{{ asset($tentangKontak->foto ?? '-') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 content order-last order-lg-first" data-aos="fade-up" data-aos-delay="100">
                    <h3>SD Negeri 18 Dewantara</h3>
                    <p class="text-justify text">
                        {{ $tentangKontak->konten_tentang ?? 'Informasi tentang sekolah belum tersedia.' }}
                    </p>

                    <div class="card">
                        <div class="card-header text-white" style="background-color: #009970;">
                            <strong>Identitas Sekolah</strong>
                        </div>
                        <div class="card-body">
                            <p class="mb-0"><strong>NPSN:</strong> 10100711</p>
                            <p class="mb-0"><strong>Status:</strong> Negeri</p>
                            <p class="mb-0"><strong>Bentuk Pendidikan:</strong> SD</p>
                            <p class="mb-0"><strong>Status Kepemilikan:</strong> Pemerintah Daerah</p>
                            <p class="mb-0"><strong>SK Pendirian Sekolah:</strong> 2007</p>
                            <p class="mb-0"><strong>Tanggal SK Pendirian:</strong> 2006-07-16</p>
                            <p class="mb-0"><strong>SK Izin Operasional:</strong> 420/630/2019</p>
                            <p class="mb-0"><strong>Tanggal SK Izin Operasional:</strong> 2019-08-20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section id="berita" class="about section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita dan Pengumuman Terbaru</h2>
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                    "delay": 9000
                                },
                                "slidesPerView": "auto",
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                },
                                "navigation": {
                                    "nextEl": ".swiper-button-next",
                                    "prevEl": ".swiper-button-prev"
                                },
                                "breakpoints": {
                                    "320": {
                                        "slidesPerView": 1,
                                        "spaceBetween": 40
                                    },
                                    "1200": {
                                        "slidesPerView": 1,
                                        "spaceBetween": 1
                                    }
                                }
                            }
                        </script>

                        <div class="swiper-wrapper">
                            @foreach ($dataBerita as $berita)
                                <div class="swiper-slide" role="group"
                                    aria-label="{{ $loop->iteration }} / {{ $loop->count }}"
                                    data-swiper-slide-index="{{ $loop->index }}">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid">
                                    <div class="slide-content">
                                        <h1>{{ $berita->judul }}</h1>
                                        <p>{{ Str::limit(strip_tags($berita->isi), 400) }}</p>
                                        <a href="{{ route('berita.show', $berita->slug) }}"
                                            class="btn btn-get-started">Selengkapnya</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section id="fasilitas" class="team section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Fasilitas</h2>
            <p>Fasilitas belajar merupakan sarana dan prasarana pembelajaran. Prasarana meliputi kantin,
                ruang belajar, lapangan olahraga, Ruang Guru, Ruang Perpustakaan dll.</p>
        </div>

        <div class="container">
            <div class="row gy-4 d-flex justify-content-center">
                @foreach ($fasilitas as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member w-100">
                            <a href="{{ asset($item->foto_url) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset($item->foto_url) }}" class="card-img-top img-fluid"
                                    alt="{{ $item->name }}" style="object-fit: cover; height: 250px;">
                            </a>
                            <div class="card-body text-center">
                                <h4>{{ $item->name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="portfolio section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p>Dibawah ini adalah bukti dokumentasi kegiatan akademik dan non akademik yang terdapat pada sekolah kami:</p>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*"
                        class="{{ request('kategori') == 'all' || !request('kategori') ? 'filter-active' : '' }}">
                        <a href="{{ route('landing.index', ['kategori' => 'all']) }}#galeri">All</a>
                    </li>
                    @foreach ($kategori as $cat)
                        <li data-filter=".filter-{{ $cat->kategori }}"
                            class="{{ request('kategori') == $cat->kategori ? 'filter-active' : '' }}">
                            <a href="{{ route('landing.index', ['kategori' => $cat->kategori]) }}#galeri">
                                {{ ucfirst($cat->kategori) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galeri as $item)
                        <div class=" col-lg-3 col-md-6 portfolio-item isotope-item filter-{{ $item->kategori }}">
                            <div class="portfolio-content h-100">
                                <a href="{{ asset($item->foto_url) }}" data-gallery="portfolio-gallery-app"
                                    class="glightbox">
                                    <img src="{{ asset($item->foto_url) }}" class="img-fluid"
                                        alt="{{ $item->title }}">
                                </a>
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                    <p> {{ Str::limit(strip_tags($item->caption), 500) }}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="blog-pagination section mt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <ul class="pagination">
                                <li>
                                    <a
                                        href="{{ $galeri->appends(['kategori' => request('kategori')])->previousPageUrl() }}#galeri">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>

                                @for ($i = 1; $i <= $galeri->lastPage(); $i++)
                                    <li>
                                        <a class="{{ $galeri->currentPage() == $i ? 'active' : '' }}"
                                            href="{{ $galeri->appends(['kategori' => request('kategori')])->url($i) }}#galeri">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor

                                <li>
                                    <a
                                        href="{{ $galeri->appends(['kategori' => request('kategori')])->nextPageUrl() }}#galeri">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center mt-2">
                            <p>Showing {{ $galeri->firstItem() }} to {{ $galeri->lastItem() }}
                                of {{ $galeri->total() }} results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Untuk info lebih lanjut bisa menghubungi kontak yang tercantum.</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-2">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>{{ $tentangKontak->alamat ?? 'Alamat belum tersedia.' }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <a href="{{ $tentangKontak->wa_link ?? '#' }}" target="__blank"><i
                                    class="bi bi-whatsapp flex-shrink-0"></i></a>
                            <div>
                                <h3>Hubungi Kami</h3>
                                <p>{{ $tentangKontak->no_telp ?? 'Nomor telepon belum tersedia.' }}</p>
                            </div>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.281629970972!2d97.00947967523132!3d5.218377394759371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30477732025178f9%3A0x5b2d1c66dddf9033!2sSD%20NEGERI%2018%20DEWANTARA!5e0!3m2!1sen!2sid!4v1724673940912!5m2!1sen!2sid"
                            frameborder="0" style="border:0; width: 100%; height: 300px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Kontak Section -->
@endsection

@push('js')
@endpush
