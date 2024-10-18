<?php

namespace App\Http\Controllers\Landing;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\TentangKontak;
use App\Models\KategoriBerita;
use App\Http\Controllers\Controller;

class LandingBeritaController extends Controller
{
    public function index(Request $request)
    {
        $tentangKontak = TentangKontak::first();
        $search = $request->input('search');

        $dataBerita = Berita::where('status', 'publish')
            ->whereHas('kategoriBerita', function ($query) {
                $query->where('name', '!=', 'pengumuman');
            })
            ->when($search, function ($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6);

        $dataKategoriBerita = KategoriBerita::all();

        return view('landing.berita.index', compact('dataBerita', 'dataKategoriBerita', 'tentangKontak'));
    }

    public function indexPengumuman(Request $request)
    {
        $tentangKontak = TentangKontak::first();
        $search = $request->input('search');

        $dataBerita = Berita::where('status', 'publish')
            ->whereHas('kategoriBerita', function ($query) {
                $query->where('name', 'pengumuman');
            })
            ->when($search, function ($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6);

        $dataKategoriBerita = KategoriBerita::all();

        return view('landing.berita.indexPengumuman', compact('dataBerita', 'dataKategoriBerita', 'tentangKontak'));
    }

    public function show($slug)
    {
        $tentangKontak = TentangKontak::first();
        $dataBerita = Berita::where('slug', $slug)->firstOrFail();
        $dataWidgetBerita = Berita::latest()->take(6)->get();
        $dataKategoriBerita = KategoriBerita::withCount(['berita' => function ($query) {
            $query->where('status', 'publish'); // Filter berita yang publish
        }])->get();

        return view('landing.berita.detail', compact('dataBerita', 'dataKategoriBerita', 'dataWidgetBerita', 'tentangKontak'));
    }
}
