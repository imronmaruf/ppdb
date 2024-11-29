<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Ortu;
use App\Models\User;
use App\Models\Wali;
use App\Models\Berkas;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use App\Models\TentangKontak;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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

        // Default status progress
        $progresBar = [
            'regisAkun' => true,
            'formsiswa' => false,
            'ortu' => false,
            'wali' => false,
            'berkas' => false,
            'status' => 'Belum Melengkapi Data'
        ];

        // Cek apakah data peserta_ppdb tersedia
        if ($dataPendaftaran) {
            $progresBar['regisAkun'] = true;
            // Mengubah ini dari user_id ke id pada PesertaPpdb
            $dataPeserta = PesertaPpdb::where('id', $dataPendaftaran->id)->first();
            $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
            $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
            $dataBerkas = Berkas::where('peserta_ppdb_id', $dataPendaftaran->id)->first();

            // Update status berdasarkan data yang diisi
            $progresBar['formsiswa'] = $dataPeserta ? true : false;
            $progresBar['ortu'] = $dataOrtu ? true : false;
            $progresBar['wali'] = $dataWali ? true : false;
            $progresBar['berkas'] = $dataBerkas ? true : false;

            // Jika ada data yang belum lengkap, set status menjadi "Belum Melengkapi Data"
            if (!$progresBar['formsiswa'] || !$progresBar['ortu'] || !$progresBar['wali'] || !$progresBar['berkas']) {
                $progresBar['status'] = 'Belum Melengkapi Data';
            } else {
                // Jika semua data lengkap, status tetap dari database (verifikasi, diterima, ditolak)
                $progresBar['status'] = $dataPendaftaran->status; // verifikasi, diterima, atau ditolak
            }
        }

        // Tentukan current step berdasarkan progres
        $currentStep = 'regisAkun';
        if ($progresBar['regisAkun']) {
            $currentStep = 'formsiswa';
            if ($progresBar['formsiswa']) {
                $currentStep = 'ortu';
                if ($progresBar['ortu']) {
                    $currentStep = 'wali';
                    if ($progresBar['wali']) {
                        $currentStep = 'berkas';
                        if ($progresBar['berkas']) {
                            $currentStep = 'status';
                        }
                    }
                }
            }
        }

        // Hitung progres berdasarkan langkah yang telah diselesaikan
        $totalSteps = 6; // Total langkah: pendaftaran, peserta, ortu, wali, berkas
        $completedSteps = 0;

        if ($progresBar['regisAkun']) $completedSteps++;
        if ($progresBar['formsiswa']) $completedSteps++;
        if ($progresBar['ortu']) $completedSteps++;
        if ($progresBar['wali']) $completedSteps++;
        if ($progresBar['berkas']) $completedSteps++;

        // Hitung persentase progres
        $progressPercentage = ($completedSteps / $totalSteps) * 100;

        // Jika status diterima, progress menjadi 100%
        if ($progresBar['status'] == 'diterima') {
            $progressPercentage = 100;
        }

        // Cek apakah formulir yang belum lengkap untuk di card
        $dataBelumLengkap = [];
        if (!$dataPendaftaran) $dataBelumLengkap[] = 'data formulir calon siswa';
        if (!$dataOrtu) $dataBelumLengkap[] = 'data orang tua';
        if (!$dataWali) $dataBelumLengkap[] = 'data wali';
        if (!$dataBerkas) $dataBelumLengkap[] = 'berkas';


        $dataUser = User::find(Auth::id());
        // Kirim data ke view
        return view('admin.index', [
            'dataUser' => $dataUser,
            'dataPendaftaran' => $dataPendaftaran,
            'dataOrtu' => $dataOrtu,
            'dataWali' => $dataWali,
            'dataBerkas' => $dataBerkas,
            'dataBelumLengkap' => $dataBelumLengkap,
            'totalPeserta' => $totalPendaftar,
            'totalVerifikasi' => $totalVerifikasi,
            'totalDiterima' => $totalDiterima,
            'totalDitolak' => $totalDitolak,
            'progresBar' => $progresBar,
            'currentStep' => $currentStep,
            'progressPercentage' => $progressPercentage
        ]);
    }


    // public function cetakFormulir()
    // {
    //     $dataPendaftaran = PesertaPpdb::where('user_id', Auth::id())->first();

    //     if (!$dataPendaftaran) {
    //         // Redirect back with error message
    //         return redirect()->route('dashboard.index')->with('error', 'Anda belum mengisi formulir');
    //     }
    //     $kepsek = User::where('role', 'kepsek')->first();

    //     $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
    //     $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();

    //     $pdf = PDF::loadView('admin.data-cetak.cetak_formulir', [
    //         'dataPendaftaran' => $dataPendaftaran,
    //         'dataOrtu' => $dataOrtu,
    //         'dataWali' => $dataWali,
    //         'kepsek' => $kepsek

    //     ]);

    //     return $pdf->stream('formulir-pendaftaran.pdf');
    // }



    public function cetakFormulir()
    {
        $dataPendaftaran = PesertaPpdb::where('user_id', Auth::id())->first();
        $dataOrtu = $dataPendaftaran ? Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first() : null;
        $dataWali = $dataPendaftaran ? Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first() : null;
        $dataBerkas = $dataPendaftaran ? Berkas::where('peserta_ppdb_id', $dataPendaftaran->id)->first() : null;

        if (!$dataPendaftaran) {
            return redirect()->route('dashboard.index')->with('error', 'Anda belum mengisi formulir.');
        }

        $errors = collect([
            'Data Orang Tua' => $dataOrtu,
            'Data Wali' => $dataWali,
            'Data Berkas' => $dataBerkas
        ])->filter(fn($value) => !$value)
            ->keys()
            ->implode(' dan ');

        if ($errors) {
            return redirect()->route('dashboard.index')->with('error', 'Belum melengkapi: ' . $errors);
        }


        $kepsek = User::where('role', 'kepsek')->first();
        $email = TentangKontak::pluck('email')->first();

        $dataOrtu = Ortu::where('peserta_ppdb_id', $dataPendaftaran->id)->first();
        $dataWali = Wali::where('peserta_ppdb_id', $dataPendaftaran->id)->first();

        return view('admin.data-cetak.cetak_formulir', [
            'dataPendaftaran' => $dataPendaftaran,
            'dataOrtu' => $dataOrtu,
            'dataWali' => $dataWali,
            'kepsek' => $kepsek,
            'email' => $email
        ]);
    }
}
