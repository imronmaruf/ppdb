<?php

namespace App\Http\Controllers\Landing;

use App\Models\Galeri;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'caption' => 'required|string|max:500',
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

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.landing-page.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'required|string|max:500',
            'kategori' => 'required',
            'foto_url' => 'nullable|file|mimes:jpg,png|max:2048',
        ], [
            'foto_url.mimes' => 'File harus berupa JPG, PNG.',
            'title.required' => 'Judul harus diisi.',
            'caption.required' => 'Caption harus diisi.',
            'kategori.required' => 'Kategori harus diisi',
        ]);

        DB::beginTransaction();
        try {
            $galeri = Galeri::findOrFail($id);
            $username = Auth::user()->name;

            $galeri->title = $request->input('title');
            $galeri->caption = $request->input('caption');
            $galeri->kategori = $request->input('kategori');

            if ($request->hasFile('foto_url')) {
                DeleteFile::delete($galeri->foto_url);
                $galeri->foto_url = UploadFile::upload('uploads/galeri', $request->file('foto_url'), $username);
            }

            $galeri->save();

            DB::commit();

            return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
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
