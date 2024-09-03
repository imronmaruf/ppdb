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
        // Validasi file
        $request->validate([
            'kategori' => 'required',
            'file' => 'required|array|min:1',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi multiple files
        ]);

        // Dapatkan username dari akun yang sedang login
        $username = Auth::user()->name;

        // Simpan file ke folder publik
        $urls = [];
        foreach ($request->file('file') as $file) {
            $urls[] = UploadFile::upload('uploads/galeri', $file, $username);
        }

        // Simpan URL file ke database
        foreach ($urls as $url) {
            Galeri::create(['foto_url' => $url, 'kategori' => $request->input('kategori')]);
        }

        // Simpan pesan sukses ke session dan redirect ke halaman index
        session()->flash('success', 'Foto fasilitas berhasil diupload.');
        return redirect()->route('fasilitas.index');
    }

    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selected_files', []);

        if ($selectedIds) {
            // Ambil URL gambar yang akan dihapus
            $galeri = Galeri::whereIn('id', $selectedIds)->get();

            // Hapus gambar dari server
            foreach ($galeri as $item) {
                DeleteFile::delete($item->foto_url);
            }

            // Hapus record dari database
            Galeri::whereIn('id', $selectedIds)->delete();

            return redirect()->route('galeri.index')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('galeri.index')->with('error', 'Tidak ada gambar yang dipilih untuk dihapus.');
    }
}
