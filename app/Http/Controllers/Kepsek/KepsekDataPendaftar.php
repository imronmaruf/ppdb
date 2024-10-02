<?php

namespace App\Http\Controllers\Kepsek;

use PDF;
use App\Models\Ortu;
use App\Models\User;
use App\Models\Wali;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use App\Models\TentangKontak;
use App\Http\Controllers\Controller;

class KepsekDataPendaftar extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter tahun dan status dari request
        $startYear = $request->input('start_year') ? date('Y', strtotime($request->input('start_year'))) : null;
        $endYear = $request->input('end_year') ? date('Y', strtotime($request->input('end_year'))) : null;
        $status = $request->input('status');

        // Query untuk peserta_ppdb dengan filter tahun dan status
        $pesertaPpdb = PesertaPpdb::with(['ortu', 'wali', 'berkas'])
            ->when($startYear && $endYear, function ($query) use ($startYear, $endYear) {
                return $query->whereBetween('created_at', ["$startYear-01-01", "$endYear-12-31"]);
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->get();

        // Menghitung total pendaftar berdasarkan status
        $totalStatus = [
            'diterima' => PesertaPpdb::where('status', 'diterima')->count(),
            'verifikasi' => PesertaPpdb::where('status', 'verifikasi')->count(),
            'ditolak' => PesertaPpdb::where('status', 'ditolak')->count(),
            'belum_melengkapi' => PesertaPpdb::where(function ($query) {
                $query->whereDoesntHave('ortu')
                    ->orWhereDoesntHave('wali')
                    ->orWhereDoesntHave('berkas');
            })->count()
        ];

        return view('admin.kepsek-data-pendaftar.index', compact('pesertaPpdb', 'totalStatus', 'startYear', 'endYear', 'status'));
    }


    public function show($id)
    {
        // Mengambil data peserta PPDB beserta relasi ortu, wali, dan berkas berdasarkan ID
        $dataPendaftar = PesertaPpdb::with(['ortu', 'wali', 'berkas'])->findOrFail($id);

        // Mengirim data ke view
        return view('admin.kepsek-data-pendaftar.show', compact('dataPendaftar'));
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
            })
            ->get();

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
}
