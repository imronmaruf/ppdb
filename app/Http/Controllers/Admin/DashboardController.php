<?php

namespace App\Http\Controllers\Admin;

use App\Models\PesertaPpdb;
use App\Models\Ortu;
use App\Models\Wali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data peserta_ppdb untuk user yang sedang login
        $dataPendaftaran = PesertaPpdb::where('user_id', Auth::id())->first();

        // Jika data peserta_ppdb tidak ditemukan, kirim null ke view
        if (!$dataPendaftaran) {
            return view('admin.index', [
                'dataPendaftaran' => null,
                'dataOrtu' => null,
                'dataWali' => null
            ]);
        }

        // Ambil data ortu dan wali berdasarkan data peserta_ppdb yang ditemukan
        $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
        $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();

        // Kirim data ke view
        return view('admin.index', [
            'dataPendaftaran' => $dataPendaftaran,
            'dataOrtu' => $dataOrtu,
            'dataWali' => $dataWali
        ]);
    }

    public function cetakFormulir()
    {
        $dataPendaftaran = PesertaPpdb::where('user_id', Auth::id())->first();
        $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
        $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();

        $pdf = \PDF::loadView('admin.cetak_formulir', [
            'dataPendaftaran' => $dataPendaftaran,
            'dataOrtu' => $dataOrtu,
            'dataWali' => $dataWali
        ]);

        return $pdf->download('formulir-pendaftaran.pdf');
    }
}
