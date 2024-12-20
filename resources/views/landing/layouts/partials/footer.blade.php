<footer id="footer" class="footer light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-8 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">PPDB SD N 18 Dewantara</span>
                </a>
                {{-- <p>{{ Str::words($tentangKontak->konten_tentang, 50, '...') }}</p> --}}

                <div class="social-links d-flex mt-4">
                    <a href="{{ $tentangKontak->wa_link ?? '#' }}"><i class="bi bi-whatsapp"></i></a>
                    <p></p>
                    {{-- <a href="{{ $tentangKontak->email ?? '#' }}"><i class="bi bi-whatsapp"></i></a>
                    <p></p> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                <h4>Hubungi Kami</h4>
                <p>{{ $tentangKontak->alamat ?? '-' }}</p>
                <p class="mt-4"><strong>Telepon:</strong> <span>{{ $tentangKontak->no_telp ?? '-' }}</span></p>
                <p class="mt-0"><strong>Email:</strong> <span>{{ $tentangKontak->email ?? '-' }}</span></p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>PPDB Online</span> <strong class="px-1 sitename">SDN 18 Dewantara</strong>
        </p>
    </div>

</footer>
