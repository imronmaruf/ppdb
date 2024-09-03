@extends('landing.layouts.main')

@push('title')
    PPDB SD N DEWANTARA
@endpush

@push('css')
    <style>
        .pagination-container {
            text-align: center;
            padding: 30px 0;
        }

        .pagination {
            margin: 0;
            padding: 0;
            list-style: none;
            display: inline-block;
        }

        .pagination .page-item {
            display: inline;
        }

        .pagination .page-link {
            display: inline-block;
            padding: 5px 10px;
            color: #fff;
            background-color: #1fe7b2;
            margin: 0 2px;
            border-radius: 3px;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #007a58;
        }

        .pagination .page-item.active .page-link {
            background-color: #007a58;
            color: #fff;
            font-weight: bold;
        }

        .pagination-info {
            color: #222;
            margin-top: 10px;
        }

        .pagination-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('assets/img/img3.jpg') }}" alt="" data-aos="fade-in" class="">
        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Selamat Datang di SD Negeri 18 Dewantara</h2>
                    <p>Ayo Kita Belajar Bersama</p>
                    <a href="{{ route('register') }}" class="btn-get-started">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- Tentang Section -->
    <section id="tentang" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up"
                    data-aos-delay="200">
                    <img src="{{ asset($tentangKontak->foto ?? '-') }}  " class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 content order-last order-lg-first" data-aos="fade-up" data-aos-delay="100">
                    <h3>SD Negeri 18 Dewantara</h3>
                    <p>
                        {{ $tentangKontak->konten_tentang ?? 'Informasi tentang sekolah belum tersedia.' }}
                    </p>


                    <div class="card">
                        <div class="card-header text-white" style="background-color: #009970;">
                            <strong> Identitas Sekolah</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>NPSN :</strong> 10100711</p>
                            <p><strong>Status :</strong> Negeri</p>
                            <p><strong>Bentuk Pendidikan :</strong> SD</p>
                            <p><strong>Status Kepemilikan :</strong> Pemerintah Daerah</p>
                            <p><strong>SK Pendirian Sekolah :</strong> 2007</p>
                            <p><strong>Tanggal SK Pendirian :</strong> 2006-07-16</p>
                            <p><strong>SK Izin Operasional :</strong> 420/630/2019</p>
                            <p><strong>Tanggal SK Izin Operasional :</strong> 2019-08-20</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- /tentang Section -->

    <!-- Fasilitas Section -->
    <section id="fasilitas" class="services light-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title" data-aos="fade-right">
                        <h2>Fasilitas</h2>
                        <p>Fasilitas belajar merupakan sarana dan prasarana pembelajaran. Prasarana meliputi kantin, ruang
                            belajar, lapangan olahraga, Ruang Guru, Ruang Perpustakaan dll.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($fasilitas as $item)
                            <div class="col-md-4 d-flex align-items-stretch mt-4">
                                <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="100">
                                    <img src="{{ asset($item->foto_url) }}" class="img-fluid rounded-2" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Fasilitas Section -->


    <!-- Stats Section -->
    <section id="stats" class="stats section accent-background">
    </section><!-- /Stats Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
        <img src="{{ asset('assets/img/img1.jpg') }}" alt="">
    </section><!-- /Call To Action Section -->

    <!-- Galeri Section -->
    {{-- <section id="galeri" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p>Dibawah ini adalah bukti dokumentasi kegiatan akademik dan non akademik yang terdapat pada sekolah kami :</p>
        </div>
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($kategori as $cat)
                        <li data-filter=".filter-{{ $cat->kategori }}">{{ ucfirst($cat->kategori) }}</li>
                    @endforeach
                </ul>
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galeri as $item)
                        <div class="col-lg-2 col-md-6 portfolio-item isotope-item filter-{{ $item->kategori }}">
                            <div class="portfolio-content h-100">
                                <a href="{{ asset($item->foto_url) }}" data-gallery="portfolio-gallery-app"
                                    class="glightbox">
                                    <img src="{{ asset($item->foto_url) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- /Galeri Section --> --}}

    <!-- Galeri Section -->
    <section id="galeri" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p>Dibawah ini adalah bukti dokumentasi kegiatan akademik dan non akademik yang terdapat pada sekolah kami :</p>
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
                            <a
                                href="{{ route('landing.index', ['kategori' => $cat->kategori]) }}#galeri">{{ ucfirst($cat->kategori) }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="row gy-4 isotope-container align-items-center justify-content-center" data-aos="fade-up"
                    data-aos-delay="200">
                    @foreach ($galeri as $item)
                        <div class="col-lg-2 col-md-6 portfolio-item isotope-item filter-{{ $item->kategori }}">
                            <div class="portfolio-content h-100">
                                <a href="{{ asset($item->foto_url) }}" data-gallery="portfolio-gallery-app"
                                    class="glightbox">
                                    <img src="{{ asset($item->foto_url) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="d-flex flex-column align-items-center mt-4">
                    <nav data-aos="fade-up" data-aos-delay="100">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $galeri->appends(['kategori' => request('kategori')])->previousPageUrl() }}#galeri">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $galeri->lastPage(); $i++)
                                <li class="page-item {{ $galeri->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $galeri->appends(['kategori' => request('kategori')])->url($i) }}#galeri">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $galeri->appends(['kategori' => request('kategori')])->nextPageUrl() }}#galeri">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="text-center mt-2" data-aos="fade-up" data-aos-delay="200">
                        <p>Showing {{ $galeri->firstItem() }} to {{ $galeri->lastItem() }} of {{ $galeri->total() }}
                            results</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Galeri Section -->



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
