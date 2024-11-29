<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Exports\PpdbExport;
use App\Helpers\DeleteFile;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use App\Models\TentangKontak;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

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

    public function cetakLaporan(Request $request)
    {
        // Ambil filter tahun dan status dari request
        $tahun = $request->input('tahun');
        $status = $request->input('status');

        // Query untuk peserta_ppdb dengan filter tahun dan status
        $dataPendaftaran = PesertaPpdb::with(['ortu', 'wali', 'berkas'])
            ->when($tahun, function ($query) use ($tahun) {
                return $query->whereYear('created_at', $tahun);
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })->get();

        // Menghitung total peserta berdasarkan status dengan filter tahun
        $totalPesertaDiterima = PesertaPpdb::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('created_at', $tahun);
        })->where('status', 'diterima')->count();

        $totalPesertaDitolak = PesertaPpdb::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('created_at', $tahun);
        })->where('status', 'ditolak')->count();

        $totalPesertaVerifikasi = PesertaPpdb::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('created_at', $tahun);
        })->where('status', 'verifikasi')->count();

        $totalPesertaBelumMelengkapiData = PesertaPpdb::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('created_at', $tahun);
        })->where(function ($query) {
            $query->whereDoesntHave('ortu')
                ->orWhereDoesntHave('wali')
                ->orWhereDoesntHave('berkas');
        })->count();

        // Ambil data kepsek
        $kepsek = User::where('role', 'kepsek')->first();
        $email = TentangKontak::pluck('email')->first();

        return view('admin.data-cetak.cetak_laporan', [
            'dataPendaftaran' => $dataPendaftaran,
            'totalPesertaDiterima' => $totalPesertaDiterima,
            'totalPesertaDitolak' => $totalPesertaDitolak,
            'totalPesertaVerifikasi' => $totalPesertaVerifikasi,
            'totalPesertaBelumMelengkapiData' => $totalPesertaBelumMelengkapiData,
            'kepsek' => $kepsek,
            'email' => $email
        ]);
    }

    public function exportExcel(Request $request)
    {
        $tahun = $request->input('tahun');
        $status = $request->input('status');
        return Excel::download(new PpdbExport($tahun, $status), 'data-ppdb.xlsx');
    }
}
