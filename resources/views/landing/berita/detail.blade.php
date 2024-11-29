@extends('landing.layouts.main')

@push('title')
    Berita | {{ $dataBerita->slug }}
@endpush

@push('css')
    <link href="{{ asset('landing/assets/css/blog.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>
                {{ $dataBerita->kategoriBerita->name == 'Pengumuman' ? 'Pengumuman' : 'Berita' }}
            </h1>
            <nav class="breadcrumbs">
                <ol>
                    <li>
                        <a
                            href="{{ $dataBerita->kategoriBerita->name == 'Pengumuman' ? route('berita.indexPengumuman') : route('berita.index') }}">
                            {{ $dataBerita->kategoriBerita->name == 'Pengumuman' ? 'Pengumuman' : 'Berita' }}
                        </a>
                    </li>
                    <li class="current">{{ $dataBerita->judul }}</li>
                </ol>
            </nav>

        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{ $dataBerita->gambar }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $dataBerita->judul }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-details.html"></a> {{ $dataAdmin->name }}</li> --}}
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-details.html"><time
                                                datetime="{{ $dataBerita->created_at->format('yyyy-mm-dd') }}">{{ $dataBerita->created_at->format('d F Y') }}</time></a>
                                    </li>


                                    <li class="d-flex align-items-center"><i class="bi bi-folder"></i> <a
                                            href="blog-details.html">{{ $dataBerita->kategoriBerita->name }}</a></li>


                                    <li class="d-flex align-items-center"><i class="bi bi-file-pdf"></i>
                                        @if ($dataBerita->file)
                                            <a href="{{ $dataBerita->file }}" target="__blank">Lihat Dokumen</a>
                                        @else
                                            <span>Tidak ada dokumen</span>
                                        @endif
                                    </li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $dataBerita->isi !!}
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $dataBerita->kategoriBerita->name }}</a></li>
                                </ul>

                                {{-- <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul> --}}
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Search Widget -->
                    {{-- <div class="search-widget widget-item">
                        <h3 class="widget-title">Cari...</h3>
                        <form id="searchForm" action="{{ route('berita.index') }}" method="GET">
                            <input type="text" id="search" name="search" placeholder="Cari berita..."
                                onkeyup="this.form.submit()">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!--/Search Widget --> --}}

                    <!-- Kategori -->
                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">Kategori</h3>
                        <ul>
                            @foreach ($dataKategoriBerita as $data)
                                <li><a href="#">{{ $data->name }}
                                        <span>({{ $data->berita_count }})</span>
                                    </a></li>
                            @endforeach
                        </ul>


                    </div><!--/Kategori -->


                    <!-- Berita Terbaru Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Berita Terbaru</h3>
                        @foreach ($dataWidgetBerita as $data)
                            <div class="post-item">
                                <h4><a href="{{ route('berita.show', $data->slug) }}">{{ $data->judul }}</a></h4>
                                <time
                                    datetime="{{ $data->created_at->format('yyyy-mm-dd') }}">{{ $data->created_at->format('d F Y') }}</time>
                            </div><!-- End recent post item-->
                        @endforeach

                    </div><!--/Recent Posts Widget -->
                </div>

            </div>

        </div>
    </div>
@endsection
