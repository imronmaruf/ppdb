<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DataPendaftarController extends Controller
{

    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses
        if (!Gate::allows('admin-only')) {
            abort(403);
        }

        // Mengambil data peserta PPDB beserta relasi ortu, wali, dan berkas
        $pesertaPpdb = PesertaPpdb::with(['ortu', 'wali', 'berkas'])->get();

        // Mengirim data ke view
        return view('admin.data-pendaftar.index', compact('pesertaPpdb'));
    }

    public function show($id)
    {
        if (!Gate::allows('admin-only')) {
            abort(403);
        }

        // Mengambil data peserta PPDB beserta relasi ortu, wali, dan berkas berdasarkan ID
        $dataPendaftar = PesertaPpdb::with(['ortu', 'wali', 'berkas'])->findOrFail($id);

        // Mengirim data ke view
        return view('admin.data-pendaftar.show', compact('dataPendaftar'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!Gate::allows('admin-only')) {
            abort(403);
        }

        $status = $request->input('status');

        $pesertaPpdb = PesertaPpdb::findOrFail($id);
        $pesertaPpdb->status = $status;
        $pesertaPpdb->save();

        return redirect()->route('data-pendaftar.show', $id)->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('admin-only')) {
            abort(403);
        }

        $pesertaPpdb = PesertaPpdb::findOrFail($id);

        // Hapus file-file terkait menggunakan helper DeleteFile
        if ($pesertaPpdb->berkas) {
            DeleteFile::delete($pesertaPpdb->berkas->akte_kelahiran);
            DeleteFile::delete($pesertaPpdb->berkas->kk);
            DeleteFile::delete($pesertaPpdb->berkas->ktp_ortu);
            DeleteFile::delete($pesertaPpdb->berkas->ijazah);
            DeleteFile::delete($pesertaPpdb->berkas->kartu_pkh);
            DeleteFile::delete($pesertaPpdb->berkas->pas_foto);
        }

        // Hapus data dari tabel terkait
        $pesertaPpdb->delete();

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('data-pendaftar.index')->with('success', 'Data berhasil dihapus.');
    }
}
