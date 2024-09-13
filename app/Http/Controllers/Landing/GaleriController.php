<?php

namespace App\Http\Controllers\Landing;

use App\Models\Galeri;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index()
    {
        // Ambil data galeri berdasarkan kategori
        $dataGaleriAkademik = Galeri::where('kategori', 'akademik')->get();
        $dataGaleriNonAkademik = Galeri::where('kategori', 'non-akademik')->get();

        return view('admin.landing-page.galeri.index', compact('dataGaleriAkademik', 'dataGaleriNonAkademik'));
    }

    public function create()
    {
        return view('admin.landing-page.galeri.create');
    }

    public function store(Request $request)
    {
        // Validasi file dan input lainnya
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'required',
            'kategori' => 'required',
            'file' => 'required|array|min:1',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi multiple files
        ]);

        // Dapatkan username dari akun yang sedang login
        $username = Auth::user()->name;

        // Debugging: Cek apakah file diterima
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'Tidak ada file yang diunggah'], 400);
        }

        // Simpan file ke folder publik
        $urls = [];
        foreach ($request->file('file') as $file) {
            $urls[] = UploadFile::upload('uploads/galeri', $file, $username);
        }

        // Simpan URL file dan data lainnya ke database
        foreach ($urls as $url) {
            Galeri::create([
                'foto_url' => $url,
                'title' => $request->input('title'),
                'caption' => $request->input('caption'),
                'kategori' => $request->input('kategori')
            ]);
        }

        // Simpan pesan sukses ke session dan redirect ke halaman index
        session()->flash('success', 'Galeri berhasil ditambahkan!');
        return redirect()->route('galeri.index');
    }


    public function destroy($id)
    {
        // Hapus galeri dan file terkait
        $galeri = Galeri::find($id);
        if ($galeri) {
            DeleteFile::delete($galeri->foto_url);
            $galeri->delete();
        }

        return redirect()->route('galeri.index');
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->input('selected_files', []);

        if (empty($ids)) {
            return redirect()->route('galeri.index')->with('error', 'Tidak ada foto yang dipilih.');
        }

        foreach ($ids as $id) {
            $galeri = Galeri::find($id);
            if ($galeri) {
                DeleteFile::delete($galeri->foto_url);
                $galeri->delete();
            }
        }

        return redirect()->route('galeri.index')->with('success', 'Foto yang dipilih berhasil dihapus.');
    }
}
