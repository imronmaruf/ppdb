<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wali;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class WaliController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();
        // Ambil peserta_ppdb berdasarkan user_id
        $peserta = PesertaPpdb::where('user_id', $user->id)->first();

        // Jika tidak ada peserta_ppdb untuk user ini, kembalikan view dengan variabel null
        if (!$peserta) {
            return view('admin.data-wali.index', ['dataWali' => null]);
        }

        // Ambil data wali berdasarkan peserta_ppdb_id
        $dataWali = Wali::where('peserta_ppdb_id', $peserta->id)->first();


        // Kembalikan view dengan variabel dataWali
        return view('admin.data-wali.index', compact('dataWali'));
    }


    public function create()
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }
        // $pendidikanWaliOptions = Wali::select('pendidikan')->distinct()->get();
        $pendidikanWaliOptions = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'];
        return view('admin.data-wali.create', compact('pendidikanWaliOptions'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate(
            [
                'nama_wali' => 'required|string|max:255',
                'tahun_lahir' => 'required|digits:4',
                'pendidikan' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'alamat' => 'required|string|max:500',
            ],
            [
                'nama_wali.required' => 'Nama harus diisi',
                'tahun_lahir.required' => 'Tahun lahir harus diisi',
                'pendidikan.required' => 'Pendidikan harus diisi',
                'pekerjaan.required' => 'Pekerjaan harus diisi',
                'alamat.required' => 'Alamat harus diisi',
            ]
        );

        try {
            DB::beginTransaction();

            // Ambil peserta_ppdb berdasarkan user yang login
            $pesertaPpdb = PesertaPpdb::where('user_id', Auth::id())->firstOrFail();
            // Buat data Wali
            $wali = new Wali();
            $wali->peserta_ppdb_id = $pesertaPpdb->id; // Ambil ID peserta_ppdb
            $wali->nama_wali = $validated['nama_wali'];
            $wali->tahun_lahir = $validated['tahun_lahir'];
            $wali->pendidikan = $validated['pendidikan'];
            $wali->pekerjaan = $validated['pekerjaan'];
            $wali->alamat = $validated['alamat'];

            // Simpan data ke database
            $wali->save();

            DB::commit();

            // Redirect dengan pesan sukses
            Session::flash('success', 'Data identitas wali berhasil disimpan.');
            return redirect()->route('data-wali.index');
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
        $pendidikanWaliOptions = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'];
        $dataWali = Wali::findOrFail($id);
        return view('admin.data-wali.edit', compact('dataWali', 'pendidikanWaliOptions'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate(
            [
                'nama_wali' => 'required|string|max:255',
                'tahun_lahir' => 'required|digits:4',
                'pendidikan' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'alamat' => 'required|string|max:500',
            ],
            [
                'nama_wali.required' => 'Nama harus diisi',
                'tahun_lahir.required' => 'Tahun lahir harus diisi',
                'pendidikan.required' => 'Pendidikan harus dipilih',
                'pekerjaan.required' => 'Pekerjaan harus diisi',
                'alamat.required' => 'Alamat harus diisi',
            ]
        );

        try {
            DB::beginTransaction();

            // Cari data wali berdasarkan ID
            $wali = Wali::findOrFail($id);

            // Update data Wali
            $wali->nama_wali = $validated['nama_wali'];
            $wali->tahun_lahir = $validated['tahun_lahir'];
            $wali->pendidikan = $validated['pendidikan'];
            $wali->pekerjaan = $validated['pekerjaan'];
            $wali->alamat = $validated['alamat'];

            // Simpan data ke database
            $wali->save();

            DB::commit();

            // Redirect dengan pesan sukses
            Session::flash('success', 'Data identitas wali berhasil diperbarui.');
            return redirect()->route('data-wali.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }
}
