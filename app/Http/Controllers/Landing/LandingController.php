<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TentangKontak;
use App\Models\Fasilitas;
use App\Models\Galeri;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $tentangKontak = TentangKontak::first();
        $fasilitas = Fasilitas::all();
        $kategori = Galeri::select('kategori')->distinct()->get(); // Ambil kategori yang unik

        // Cek apakah ada request untuk filter kategori
        if ($request->has('kategori') && $request->kategori != 'all') {
            $galeri = Galeri::where('kategori', $request->kategori)->paginate(5);
        } else {
            $galeri = Galeri::paginate(10); // Ambil 5 data per halaman
        }

        return view('landing.index', compact('tentangKontak', 'fasilitas', 'galeri', 'kategori'));
    }
}
