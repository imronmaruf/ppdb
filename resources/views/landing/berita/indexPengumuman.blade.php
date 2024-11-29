@extends('landing.layouts.main')

@push('title')
    Pengumuman
@endpush

@push('css')
    <link href="{{ asset('landing/assets/css/blog.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Pengumuman</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Pengumuman</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <section id="blog" class="blog section">
        <div class="container">
            <!-- Search Widget -->
            <div class="search-widget widget-item mt-0">
                <form action="{{ route('berita.indexPengumuman') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari pengumuman..." value="{{ request('search') }}">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div><!--/Search Widget -->


            <!-- Konten Pengumuman -->
            <div class="row gy-4  d-flex justify-content-center ">
                @foreach ($dataBerita as $data)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="blog-item position-relative">
                            <div class="post-img">
                                <img src="{{ $data->gambar }}" alt="" class="img-fluid">
                            </div>
                            <a href="{{ route('berita.show', $data->slug) }}" class="stretched-link">
                                <h3>{{ $data->judul }}</h3>
                            </a>
                            <p>{!! Str::limit(strip_tags($data->isi), 100) !!}</p>
                            <a href="{{ route('berita.show', $data->slug) }}" class="stretched-link">
                                <span>Selengkapnya &raquo;</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="blog-pagination" class="blog-pagination section">
        <div class="container">


            <div class="d-flex justify-content-center">
                <ul>

                    {{-- Previous Page Link --}}
                    @if ($dataBerita->onFirstPage())
                        <li class="disabled"><span><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li><a href="{{ $dataBerita->previousPageUrl() }}" rel="prev"><i
                                    class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($dataBerita->getUrlRange(1, $dataBerita->lastPage()) as $page => $url)
                        @if ($page == $dataBerita->currentPage())
                            <li><a class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($dataBerita->hasMorePages())
                        <li><a href="{{ $dataBerita->nextPageUrl() }}" rel="next"><i
                                    class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </div>
        </div>
    </section><!-- /Blog Pagination Section -->
@endsection
