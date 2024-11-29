<?php

namespace App\Http\Controllers\Landing;

use App\Models\Berita;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class BeritaController extends Controller
{
    public function index()
    {
        $dataBerita = Berita::all();
        return view('admin.landing-page.berita.index', compact('dataBerita'));
    }

    public function show($id)
    {
        $dataBerita = Berita::find($id);
        return view('admin.landing-page.berita.show', compact('dataBerita'));
    }

    public function create()
    {
        $kategoriBerita = KategoriBerita::all();
        // dd($kategoriBerita);
        return view('admin.landing-page.berita.create', compact('kategoriBerita'));
    }

    public function store(Request $request)
    {
        $dataBerita = $request->validate([
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:4096',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
            'status' => 'required|in:publish,draft',
        ], [
            'kategori_berita_id.required' => 'Kategori Berita Harus Diisi',
            'kategori_berita_id.exists' => 'Kategori Berita Tidak Valid',
            'judul.required' => 'Judul Wajib Diisi',
            'isi.required' => 'Isi Wajib Diisi',
            'gambar.mimes' => 'File harus berformat PNG, JPG, atau JPEG',
            'gambar.max' => 'File melebihi batas ukuran 4 MB',
            'file.mimes' => 'File file harus berformat .pdf, .doc, .docx, .xlx, .xlsx, .ppt, .pptx, .txt',
            'file.max' => 'File melebihi batas ukuran 2 MB',
            'status.required' => 'Status wajib diisi',
            'status.in' => 'Status Tidak Valid',
        ]);

        $dataBerita['slug'] = Str::slug($dataBerita['judul']);

        try {
            $username = Auth::user()->name;
            DB::beginTransaction();

            $berita = new Berita();
            $berita->kategori_berita_id = $dataBerita['kategori_berita_id'];
            $berita->slug = $dataBerita['slug'];
            $berita->isi = $dataBerita['isi'];
            $berita->judul = $dataBerita['judul'];
            $berita->status = $dataBerita['status'];

            if ($request->hasFile('gambar')) {
                $gambarUrl = UploadFile::upload('uploads/berita/gambar', $request->file('gambar'), $username);
                $berita['gambar'] = $gambarUrl;
            }

            if ($request->hasFile('file')) {
                $fileUrl = UploadFile::upload('uploads/berita/file', $request->file('file'), $username);
                $berita['file'] = $fileUrl;
            }

            $berita->save();

            DB::commit();
            session()->flash('success', 'Data Berita Berhasil Disimpan');
            return redirect()->route('data-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategoriBerita = KategoriBerita::all();

        return view('admin.landing-page.berita.edit', compact('berita', 'kategoriBerita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $dataBerita = $request->validate(
            [
                'kategori_berita_id' => 'required|exists:kategori_berita,id',
                'judul' => 'required',
                'isi' => 'required',
                'slug' => 'required|unique:berita,slug,' . $id,
                'gambar' => 'nullable|mimes:png,jpg,jpeg|max:4096',
                'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
                'status' => 'required|in:publish,draft',
            ],
            [
                'kategori_berita_id.required' => 'Kategori Berita Harus Diisi',
                'kategori_berita_id.exists' => 'Kategori Berita Tidak Valid',
                'judul.required' => 'Judul Wajib Diisi',
                'isi.required' => 'Isi Wajib Diisi',
                'gambar.mimes' => 'File harus berformat PNG, JPG, atau JPEG',
                'gambar.max' => 'File melebihi batas ukuran 4 MB',
                'file.mimes' => 'File file harus berformat .pdf, .doc, .docx, .xlx, .xlsx, .ppt, .pptx, .txt',
                'file.max' => 'File melebihi batas ukuran 2 MB',
                'status.required' => 'Status wajib diisi',
                'status.in' => 'Status Tidak Valid',
            ]
        );

        $dataBerita['slug'] = Str::slug($dataBerita['judul']);

        try {
            $username = Auth::user()->name;
            DB::beginTransaction();

            $berita->kategori_berita_id = $dataBerita['kategori_berita_id'];
            $berita->slug = $dataBerita['slug'];
            $berita->isi = $dataBerita['isi'];
            $berita->judul = $dataBerita['judul'];
            $berita->status = $dataBerita['status'];

            if ($request->hasFile('gambar')) {
                DeleteFile::delete($berita->gambar); // Hapus file lama
                $berita->gambar = UploadFile::upload('uploads/berita/gambar', $request->file('gambar'), $username);
            }

            if ($request->hasFile('file')) {
                DeleteFile::delete($berita->file); // Hapus file lama
                $berita->file = UploadFile::upload('uploads/berita/file', $request->file('file'), $username);
            }

            $berita->save();

            DB::commit();
            session()->flash('success', 'Data Berita Berhasil Disimpan');
            return redirect()->route('data-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);

        try {
            DB::beginTransaction();
            if ($berita->gambar) {
                DeleteFile::delete($berita->gambar);
            }
            if ($berita->file) {
                DeleteFile::delete($berita->file);
            }
            $berita->delete();
            DB::commit();

            session()->flash('success', 'Data Berita Berhasil dihapus');
            return redirect()->route('data-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
