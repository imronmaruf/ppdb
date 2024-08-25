<?php

namespace App\Http\Controllers\Admin;

use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FormPendaftaranController extends Controller
{
    public function index()
    {
        // Mengambil data pendaftar berdasarkan user_id yang sedang login
        $dataPendaftar = PesertaPpdb::where('user_id', Auth::id())->first();

        // Menampilkan halaman dengan data pendaftar
        return view('admin.form-pendaftaran.index', compact('dataPendaftar'));
    }

    public function create()
    {

        return view('admin.form-pendaftaran.create');
    }

    public function store(Request $request)
    {

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kk' => 'required|string|max:20',
            'nik' => 'required|string|max:16|unique:peserta_ppdb,nik',
            'no_akte_kelahiran' => 'required|string|max:20',
            'status_pkh' => 'required|in:ada,tidak',
            'asal_sekolah' => 'required|string|max:255',
            'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
            'alamat' => 'required|string|max:500',
            'tinggal_dengan' => 'required|string|max:255',
            'anak_ke' => 'required|string|max:2',
            'jml_saudara_kandung' => 'required|string|max:2',
            'tinggi_badan' => 'required|numeric|min:0',
            'berat_badan' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // Buat data Peserta PPDB
            $pesertaPpdb = new PesertaPpdb();
            $pesertaPpdb->user_id = Auth::id();
            $pesertaPpdb->name = $validated['name'];
            $pesertaPpdb->jenis_kelamin = $validated['jenis_kelamin'];
            $pesertaPpdb->tempat_lahir = $validated['tempat_lahir'];
            $pesertaPpdb->tanggal_lahir = $validated['tanggal_lahir'];
            $pesertaPpdb->kk = $validated['kk'];
            $pesertaPpdb->nik = $validated['nik'];
            $pesertaPpdb->no_akte_kelahiran = $validated['no_akte_kelahiran'];
            $pesertaPpdb->status_pkh = $validated['status_pkh'];
            $pesertaPpdb->asal_sekolah = $validated['asal_sekolah'];
            $pesertaPpdb->agama = $validated['agama'];
            $pesertaPpdb->alamat = $validated['alamat'];
            $pesertaPpdb->tinggal_dengan = $validated['tinggal_dengan'];
            $pesertaPpdb->anak_ke = $validated['anak_ke'];
            $pesertaPpdb->jml_saudara_kandung = $validated['jml_saudara_kandung'];
            $pesertaPpdb->tinggi_badan = $validated['tinggi_badan'];
            $pesertaPpdb->berat_badan = $validated['berat_badan'];
            $pesertaPpdb->status = 'verifikasi'; // Status default

            // Simpan data ke database
            $pesertaPpdb->save();

            DB::commit();

            // Redirect dengan pesan sukses
            Session::flash('success', 'Data Identitas Calon Siswa berhasil disimpan');
            return redirect()->route('data-pendaftaran.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $dataPendaftar = PesertaPpdb::find($id);
        return view('admin.form-pendaftaran.edit', compact('dataPendaftar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kk' => 'required|string|max:20',
            'nik' => 'required|string|max:16|unique:peserta_ppdb,nik,' . $id,
            'no_akte_kelahiran' => 'required|string|max:20',
            'status_pkh' => 'required|in:ada,tidak',
            'asal_sekolah' => 'required|string|max:255',
            'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
            'alamat' => 'required|string|max:500',
            'tinggal_dengan' => 'required|string|max:255',
            'anak_ke' => 'required|string|max:2',
            'jml_saudara_kandung' => 'required|string|max:2',
            'tinggi_badan' => 'required|numeric|min:0',
            'berat_badan' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // Temukan data peserta PPDB yang akan diperbarui
            $pesertaPpdb = PesertaPpdb::findOrFail($id);

            // Update data peserta PPDB
            $pesertaPpdb->name = $validated['name'];
            $pesertaPpdb->jenis_kelamin = $validated['jenis_kelamin'];
            $pesertaPpdb->tempat_lahir = $validated['tempat_lahir'];
            $pesertaPpdb->tanggal_lahir = $validated['tanggal_lahir'];
            $pesertaPpdb->kk = $validated['kk'];
            $pesertaPpdb->nik = $validated['nik'];
            $pesertaPpdb->no_akte_kelahiran = $validated['no_akte_kelahiran'];
            $pesertaPpdb->status_pkh = $validated['status_pkh'];
            $pesertaPpdb->asal_sekolah = $validated['asal_sekolah'];
            $pesertaPpdb->agama = $validated['agama'];
            $pesertaPpdb->alamat = $validated['alamat'];
            $pesertaPpdb->tinggal_dengan = $validated['tinggal_dengan'];
            $pesertaPpdb->anak_ke = $validated['anak_ke'];
            $pesertaPpdb->jml_saudara_kandung = $validated['jml_saudara_kandung'];
            $pesertaPpdb->tinggi_badan = $validated['tinggi_badan'];
            $pesertaPpdb->berat_badan = $validated['berat_badan'];

            // Simpan perubahan ke database
            $pesertaPpdb->save();

            DB::commit();

            // Redirect dengan pesan sukses
            Session::flash('success', 'Data Identitas Calon Siswa berhasil diperbarui');
            return redirect()->route('data-pendaftaran.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }


    public function destroy(Request $request) {}
}
