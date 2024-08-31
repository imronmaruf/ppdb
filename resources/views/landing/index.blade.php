@extends('landing.layouts.main')


@push('title')
    PPDB SD N DEWANTARA
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

    <!-- Clients Section -->
    {{-- <section id="clients" class="clients section light-background">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/img1.jpg') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/img2.jpg') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/img3.jpg') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                </div><!-- End Client Item -->

            </div>

        </div>

    </section><!-- /Clients Section --> --}}

    <!-- About Section -->
    <section id="tentang" class="about section">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up"
                    data-aos-delay="200">
                    <img src="{{ asset('assets/img/img2.jpg') }}" class="img-fluid" alt="">
                    {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> --}}
                </div>

                <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
                    <h3>SD Negeri 18 Dewantara</h3>
                    <p>
                        Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas
                        deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam
                        ut eius incidunt reiciendis veritatis asperiores placeat.
                    </p>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->


    <section id="fasilitas" class="services light-background">
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title" data-aos="fade-right">
                        <h2>Fasilitas</h2>
                        <p>Fasilitas belajar merupakan sarana dan prasarana pembelajaran. Prasarana meliputi kantin,
                            ruang belajar, lapangan olahraga, LAB Komputer, dll.</p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="100">
                                <img src="{{ asset('assets/img/img1.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                            <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="200">
                                <img src="{{ asset('assets/img/img2.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-md-6 d-flex align-items-stretch mt-4">
                            <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="300">
                                <img src="{{ asset('assets/img/img3.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-md-6 d-flex align-items-stretch mt-4">
                            <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="400">
                                <img src="{{ asset('assets/img/img2.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section accent-background">

    </section><!-- /Stats Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
        <img src="{{ asset('assets/img/img1.jpg') }}" alt="">
    </section><!-- /Call To Action Section -->

    <!-- Galeri Section -->
    <section id="galeri" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p>Dibawah ini adalah bukti dokumentasi kegiatan akademik dan non akademik yang terdapat pada sekolah kami :</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">Akademik</li>
                    <li data-filter=".filter-product">Non-Akademik</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('assets/img/img1.jpg') }}" data-gallery="portfolio-gallery-app"
                                class="glightbox"><img src="{{ asset('assets/img/img1.jpg') }}" class="img-fluid"
                                    alt=""></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('assets/img/img2.jpg') }}" data-gallery="portfolio-gallery-app"
                                class="glightbox"><img src="{{ asset('assets/img/img2.jpg') }}" class="img-fluid"
                                    alt=""></a>
                        </div>
                    </div><!-- End Portfolio Item -->


                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('assets/img/img3.jpg') }}" data-gallery="portfolio-gallery-app"
                                class="glightbox"><img src="{{ asset('assets/img/img3.jpg') }}" class="img-fluid"
                                    alt=""></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <!-- Contact Section -->
    <section id="kontak" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Untuk info lebih lanjut bisa menghubungi kontak yang tercantum.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-2">

                <div class="col-lg-12">

                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Akamat</h3>
                                <p>JL. GLEE MADAT CEUDAH,GAMPONG PALOH LADA KECAMATAN DEWANTARA - ACEH UTARA</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-whatsapp flex-shrink-0"></i>
                            <div>
                                <h3>Hubungi Kami</h3>
                                <p>+62822 4444 5555</p>
                            </div>
                        </div><!-- End Info Item -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.281629970972!2d97.00947967523132!3d5.218377394759371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30477732025178f9%3A0x5b2d1c66dddf9033!2sSD%20NEGERI%2018%20DEWANTARA!5e0!3m2!1sen!2sid!4v1724673940912!5m2!1sen!2sid"
                            frameborder="0" style="border:0; width: 100%; height: 300px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
