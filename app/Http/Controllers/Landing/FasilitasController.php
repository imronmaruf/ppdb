<?php

namespace App\Http\Controllers\Landing;

use App\Models\Fasilitas;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FasilitasController extends Controller
{
    public function index()
    {
        $dataFasilitas = Fasilitas::all();
        return view('admin.landing-page.fasilitas.index', compact('dataFasilitas'));
    }

    public function create()
    {
        return view('admin.landing-page.fasilitas.create');
    }

    public function store(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|array|min:1',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi multiple files
        ]);

        // Dapatkan username dari akun yang sedang login
        $username = Auth::user()->name;

        // Simpan file ke folder publik
        $urls = [];
        foreach ($request->file('file') as $file) {
            $urls[] = UploadFile::upload('uploads/fasilitas', $file, $username);
        }

        // Simpan URL file ke database
        foreach ($urls as $url) {
            Fasilitas::create(['foto_url' => $url]);
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
            $fasilitas = Fasilitas::whereIn('id', $selectedIds)->get();

            // Hapus gambar dari server
            foreach ($fasilitas as $item) {
                DeleteFile::delete($item->foto_url);
            }

            // Hapus record dari database
            Fasilitas::whereIn('id', $selectedIds)->delete();

            return redirect()->route('fasilitas.index')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('fasilitas.index')->with('error', 'Tidak ada gambar yang dipilih untuk dihapus.');
    }
}