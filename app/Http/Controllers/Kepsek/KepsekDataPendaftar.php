<?php

namespace App\Http\Controllers\Kepsek;

use PDF;
use App\Models\Ortu;
use App\Models\Wali;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KepsekDataPendaftar extends Controller
{
    public function index()
    {
        $pesertaPpdb = PesertaPpdb::with(['ortu', 'wali', 'berkas'])->get();

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

        // Mengirim data ke view
        return view('admin.kepsek-data-pendaftar.index', compact('pesertaPpdb', 'totalStatus'));
    }

    public function show($id)
    {
        // Mengambil data peserta PPDB beserta relasi ortu, wali, dan berkas berdasarkan ID
        $dataPendaftar = PesertaPpdb::with(['ortu', 'wali', 'berkas'])->findOrFail($id);

        // Mengirim data ke view
        return view('admin.kepsek-data-pendaftar.show', compact('dataPendaftar'));
    }

    public function cetakLaporan()
    {
        $dataPendaftaran = PesertaPpdb::with(['ortu', 'wali', 'berkas'])->get();

        $totalPesertaDiterima = PesertaPpdb::where('status', 'diterima')->count();
        $totalPesertaDitolak = PesertaPpdb::where('status', 'ditolak')->count();
        $totalPesertaBelumMelengkapiData = PesertaPpdb::where(function ($query) {
            $query->whereDoesntHave('ortu')
                ->orWhereDoesntHave('wali')
                ->orWhereDoesntHave('berkas');
        })->count();

        $pdf = PDF::loadView('admin.data-cetak.cetak_laporan', [
            'dataPendaftaran' => $dataPendaftaran,
            'totalPesertaDiterima' => $totalPesertaDiterima,
            'totalPesertaDitolak' => $totalPesertaDitolak,
            'totalPesertaBelumMelengkapiData' => $totalPesertaBelumMelengkapiData,
        ])->setPaper('a4', 'landscape');

        return response($pdf->stream('laporan-pendaftaran.pdf'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="laporan-pendaftaran.pdf"')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
