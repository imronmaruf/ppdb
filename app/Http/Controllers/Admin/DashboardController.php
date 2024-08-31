<?php

namespace App\Http\Controllers\Admin;

use App\Models\PesertaPpdb;
use App\Models\Ortu;
use App\Models\Wali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;
use PDF;


class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data peserta_ppdb
        $totalPendaftar = PesertaPpdb::count();

        // Hitung total peserta dengan status verifikasi
        $totalVerifikasi = PesertaPpdb::where('status', 'verifikasi')->count();

        // Hitung total peserta dengan status diterima
        $totalDiterima = PesertaPpdb::where('status', 'diterima')->count();

        // Hitung total peserta dengan status ditolak
        $totalDitolak = PesertaPpdb::where('status', 'ditolak')->count();

        // Ambil data peserta_ppdb untuk user yang sedang login
        $dataPendaftaran = PesertaPpdb::where('user_id', Auth::id())->first();
        $dataOrtu = null;
        $dataWali = null;
        $dataBerkas = null;

        // Jika data peserta_ppdb tidak ditemukan, kirim null ke view
        if ($dataPendaftaran) {
            // Ambil data ortu dan wali berdasarkan data peserta_ppdb yang ditemukan
            $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
            $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
            $dataBerkas = Berkas::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
            // Misalnya, jika ada tabel berkas, ambil data berkas berdasarkan peserta_ppdb_id
            // $dataBerkas = Berkas::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
        }

        // Cek apakah formulir yang belum lengkap
        $dataBelumLengkap = [];
        if (!$dataPendaftaran) $dataBelumLengkap[] = 'formulir';
        if (!$dataOrtu) $dataBelumLengkap[] = 'data orang tua';
        if (!$dataWali) $dataBelumLengkap[] = 'data wali';
        if (!$dataBerkas) $dataBelumLengkap[] = 'berkas';

        // Kirim data ke view
        return view('admin.index', [
            'dataPendaftaran' => $dataPendaftaran,
            'dataOrtu' => $dataOrtu,
            'dataWali' => $dataWali,
            'dataBelumLengkap' => $dataBelumLengkap,
            'totalPeserta' => $totalPendaftar,
            'totalVerifikasi' => $totalVerifikasi,
            'totalDiterima' => $totalDiterima,
            'totalDitolak' => $totalDitolak,
        ]);
    }


    public function cetakFormulir()
    {
        $dataPendaftaran = PesertaPpdb::where('user_id', Auth::id())->first();

        if (!$dataPendaftaran) {
            // Redirect back with error message
            return redirect()->route('dashboard.index')->with('error', 'Anda belum mengisi formulir');
        }

        $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
        $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();

        $pdf = PDF::loadView('admin.data-cetak.cetak_formulir', [
            'dataPendaftaran' => $dataPendaftaran,
            'dataOrtu' => $dataOrtu,
            'dataWali' => $dataWali
        ]);

        return $pdf->download('formulir-pendaftaran.pdf');
    }
}
