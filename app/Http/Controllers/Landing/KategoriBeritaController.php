<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $dataKategoriBerita = KategoriBerita::latest()->get();
        return view('admin.landing-page.kategori-berita.index', compact('dataKategoriBerita'));
    }

    public function edit($id)
    {
        $data = KategoriBerita::findOrFail($id);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:kategori_berita',
        ]);
        $data['slug'] = Str::slug($data['name']);
        try {
            DB::beginTransaction();
            $newKategoriBerita = new KategoriBerita();
            $newKategoriBerita->name = $data['name'];
            $newKategoriBerita->slug = $data['slug'];
            $newKategoriBerita->save();

            DB::commit();
            Session::flash('success', 'Kategori Berita Berhasil Ditambahkan');
            return redirect()->route('kategori-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:kategori_berita,name,' . $id,
        ]);
        $data['slug'] = Str::slug($data['name']);
        try {
            DB::beginTransaction();

            $dataKategoriBerita = KategoriBerita::findOrFail($id);
            $dataKategoriBerita->name = $data['name'];
            $dataKategoriBerita->slug = $data['slug'];
            $dataKategoriBerita->save();

            DB::commit();

            Session::flash('success', 'Kategori Berita Berhasil Diubah');
            return redirect()->route('kategori-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataKategoriBerita = KategoriBerita::findOrFail($id);
            $dataKategoriBerita->delete();
            DB::commit();
            Session::flash('success', 'Kategori Berita Berhasil Dihapus');
            return redirect()->route('kategori-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
