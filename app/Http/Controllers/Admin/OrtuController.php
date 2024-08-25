<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ortu;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class OrtuController extends Controller
{
    public function index()
    {

        // Ambil user yang sedang login
        $user = Auth::user();
        // Ambil peserta_ppdb berdasarkan user_id
        $peserta = PesertaPpdb::where('user_id', $user->id)->first();
        if (!$peserta) {
            // Jika tidak ada peserta_ppdb untuk user ini
            return view('admin.data-ortu.index', ['dataOrtu' => null]);
        }
        // Ambil data ortu berdasarkan peserta_ppdb_id
        $dataOrtu = Ortu::where('peserta_ppdb_id', $peserta->id)->first();

        return view('admin.data-ortu.index', compact('dataOrtu'));
    }

    public function create()
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }
        return view('admin.data-ortu.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat_ayah' => 'required|string|max:500',
            'alamat_ibu' => 'required|string|max:500',
            'tempat_lahir_tanggal_lahir_ayah' => 'required|string|max:255',
            'tempat_lahir_tanggal_lahir_ibu' => 'required|string|max:255',
            'nik_ayah' => 'required|string|max:20',
            'nik_ibu' => 'required|string|max:20',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Ambil peserta_ppdb berdasarkan user yang login
            $pesertaPpdb = PesertaPpdb::where('user_id', Auth::id())->firstOrFail();

            // Buat data Ortu
            $ortu = new Ortu();
            $ortu->peserta_ppdb_id = $pesertaPpdb->id; // Ambil ID peserta_ppdb
            $ortu->nama_ayah = $validated['nama_ayah'];
            $ortu->nama_ibu = $validated['nama_ibu'];
            $ortu->alamat_ayah = $validated['alamat_ayah'];
            $ortu->alamat_ibu = $validated['alamat_ibu'];
            $ortu->tempat_lahir_tanggal_lahir_ayah = $validated['tempat_lahir_tanggal_lahir_ayah'];
            $ortu->tempat_lahir_tanggal_lahir_ibu = $validated['tempat_lahir_tanggal_lahir_ibu'];
            $ortu->nik_ayah = $validated['nik_ayah'];
            $ortu->nik_ibu = $validated['nik_ibu'];
            $ortu->pendidikan_ayah = $validated['pendidikan_ayah'];
            $ortu->pendidikan_ibu = $validated['pendidikan_ibu'];
            $ortu->pekerjaan_ayah = $validated['pekerjaan_ayah'];
            $ortu->pekerjaan_ibu = $validated['pekerjaan_ibu'];

            // Simpan data ke database
            $ortu->save();

            DB::commit();

            // Redirect dengan pesan sukses
            Session::flash('success', 'Data identitas orang tua berhasil disimpan.');
            return redirect()->route('data-ortu.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }
        $dataOrtu = Ortu::findOrFail($id);
        return view('admin.data-ortu.edit', compact('dataOrtu'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat_ayah' => 'required|string|max:500',
            'alamat_ibu' => 'required|string|max:500',
            'tempat_lahir_tanggal_lahir_ayah' => 'required|string|max:255',
            'tempat_lahir_tanggal_lahir_ibu' => 'required|string|max:255',
            'nik_ayah' => 'required|string|max:20',
            'nik_ibu' => 'required|string|max:20',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Temukan data Ortu berdasarkan ID
            $ortu = Ortu::findOrFail($id);

            // Update data Ortu
            $ortu->nama_ayah = $validated['nama_ayah'];
            $ortu->nama_ibu = $validated['nama_ibu'];
            $ortu->alamat_ayah = $validated['alamat_ayah'];
            $ortu->alamat_ibu = $validated['alamat_ibu'];
            $ortu->tempat_lahir_tanggal_lahir_ayah = $validated['tempat_lahir_tanggal_lahir_ayah'];
            $ortu->tempat_lahir_tanggal_lahir_ibu = $validated['tempat_lahir_tanggal_lahir_ibu'];
            $ortu->nik_ayah = $validated['nik_ayah'];
            $ortu->nik_ibu = $validated['nik_ibu'];
            $ortu->pendidikan_ayah = $validated['pendidikan_ayah'];
            $ortu->pendidikan_ibu = $validated['pendidikan_ibu'];
            $ortu->pekerjaan_ayah = $validated['pekerjaan_ayah'];
            $ortu->pekerjaan_ibu = $validated['pekerjaan_ibu'];

            // Simpan perubahan ke database
            $ortu->save();

            DB::commit();

            // Redirect dengan pesan sukses
            Session::flash('success', 'Data identitas orang tua berhasil diperbarui.');
            return redirect()->route('data-ortu.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }
}
