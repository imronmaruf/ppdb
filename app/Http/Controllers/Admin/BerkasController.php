<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berkas;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BerkasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $peserta = PesertaPpdb::where('user_id', $user->id)->first();

        if (!$peserta) {
            return view('admin.data-berkas.index', ['dataBerkas' => null]);
        }

        $dataBerkas = Berkas::where('peserta_ppdb_id', $peserta->id)->first();

        return view('admin.data-berkas.index', compact('dataBerkas'));
    }

    public function create()
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }
        // $dataBerkas = Berkas::where('peserta_ppdb_id', Auth::user()->pesertaPpdb->id)->first();
        return view('admin.data-berkas.create');
    }

    public function lengkapiBerkas($id)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }
        $dataBerkas = Berkas::findOrFail($id);
        return view('admin.data-berkas.lengkapi', compact('dataBerkas'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        $validated = $request->validate(
            [
                'akte_kelahiran' => 'nullable|file|mimes:pdf|max:2048',
                'kk' => 'nullable|file|mimes:pdf|max:2048',
                'ktp_ortu' => 'nullable|file|mimes:pdf|max:2048',
                'ijazah' => 'nullable|file|mimes:pdf|max:2048',
                'kartu_pkh' => 'nullable|file|mimes:pdf|max:2048',
                'pas_foto' => 'nullable|file|mimes:jpg,png|max:2048',
            ],
            [
                'akte_kelahiran.max' => 'Ukuran file terlalu besar.',
                'kk.max' => 'Ukuran file terlalu besar.',
                'ktp_ortu.max' => 'Ukuran file terlalu besar.',
                'ijazah.max' => 'Ukuran file terlalu besar.',
                'kartu_pkh.max' => 'Ukuran file terlalu besar.',
                'pas_foto.max' => 'Ukuran file terlalu besar.',
                'file.mimes' => 'File harus berupa PDF.',
                'akte_kelahiran.mimes' => 'File harus berupa PDF.',
                'kk.mimes' => 'File harus berupa PDF.',
                'ktp_ortu.mimes' => 'File harus berupa PDF.',
                'ijazah.mimes' => 'File harus berupa PDF.',
                'kartu_pkh.mimes' => 'File harus berupa PDF.',
                'pas_foto.mimes' => 'File harus berupa JPG, PNG.',
            ]
        );

        DB::beginTransaction();

        try {
            $pesertaPpdb = PesertaPpdb::where('user_id', Auth::id())->firstOrFail();
            $username = $pesertaPpdb->name;

            $berkasData = [];

            // Mengolah berkas jika tersedia, dan tambahkan URL preview
            if ($request->hasFile('akte_kelahiran')) {
                $akteKelahiranUrl = UploadFile::upload('uploads/berkas/akte', $request->file('akte_kelahiran'), $username);
                $berkasData['akte_kelahiran'] = $akteKelahiranUrl;
            }

            if ($request->hasFile('kk')) {
                $kkUrl = UploadFile::upload('uploads/berkas/kk', $request->file('kk'), $username);
                $berkasData['kk'] = $kkUrl;
            }

            if ($request->hasFile('ktp_ortu')) {
                $ktpOrtuUrl = UploadFile::upload('uploads/berkas/ktp', $request->file('ktp_ortu'), $username);
                $berkasData['ktp_ortu'] = $ktpOrtuUrl;
            }

            if ($request->hasFile('ijazah')) {
                $ijazahUrl = UploadFile::upload('uploads/berkas/ijazah', $request->file('ijazah'), $username);
                $berkasData['ijazah'] = $ijazahUrl;
            }

            if ($request->hasFile('kartu_pkh')) {
                $kartuPkhUrl = UploadFile::upload('uploads/berkas/kartu', $request->file('kartu_pkh'), $username);
                $berkasData['kartu_pkh'] = $kartuPkhUrl;
            }

            if ($request->hasFile('pas_foto')) {
                $pasFotoUrl = UploadFile::upload('uploads/berkas/pas_foto', $request->file('pas_foto'), $username);
                $berkasData['pas_foto'] = $pasFotoUrl;
            }

            $berkasData['peserta_ppdb_id'] = $pesertaPpdb->id;

            Berkas::updateOrCreate(
                ['peserta_ppdb_id' => $pesertaPpdb->id],
                $berkasData
            );

            DB::commit();

            return redirect()->route('data-berkas.index')->with('success', 'Data berkas berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }
        $dataBerkas = Berkas::find($id);
        return view('admin.data-berkas.edit', compact('dataBerkas'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        // Validasi file yang akan diunggah
        $validated = $request->validate(
            [
                'akte_kelahiran' => 'nullable|file|mimes:pdf|max:2048',
                'kk' => 'nullable|file|mimes:pdf|max:2048',
                'ktp_ortu' => 'nullable|file|mimes:pdf|max:2048',
                'ijazah' => 'nullable|file|mimes:pdf|max:2048',
                'kartu_pkh' => 'nullable|file|mimes:pdf|max:2048',
                'pas_foto' => 'nullable|file|mimes:jpg,png|max:2048',
            ],
            [
                'akte_kelahiran.mimes' => 'File harus berupa PDF.',
                'kk.mimes' => 'File harus berupa PDF.',
                'ktp_ortu.mimes' => 'File harus berupa PDF.',
                'ijazah.mimes' => 'File harus berupa PDF.',
                'kartu_pkh.mimes' => 'File harus berupa PDF.',
                'pas_foto.mimes' => 'File harus berupa JPG, PNG.',
            ]
        );

        DB::beginTransaction();

        try {
            // Cari berkas berdasarkan ID
            $berkas = Berkas::findOrFail($id);
            $pesertaPpdb = PesertaPpdb::where('user_id', Auth::id())->firstOrFail();
            $username = $pesertaPpdb->name;

            // Hanya perbarui jika ada file baru yang diunggah
            if ($request->hasFile('akte_kelahiran')) {
                DeleteFile::delete($berkas->akte_kelahiran); // Hapus file lama
                $berkas->akte_kelahiran = UploadFile::upload('uploads/berkas/akte', $request->file('akte_kelahiran'), $username);
            }

            if ($request->hasFile('kk')) {
                DeleteFile::delete($berkas->kk);
                $berkas->kk = UploadFile::upload('uploads/berkas/kk', $request->file('kk'), $username);
            }

            if ($request->hasFile('ktp_ortu')) {
                DeleteFile::delete($berkas->ktp_ortu);
                $berkas->ktp_ortu = UploadFile::upload('uploads/berkas/ktp', $request->file('ktp_ortu'), $username);
            }

            if ($request->hasFile('ijazah')) {
                DeleteFile::delete($berkas->ijazah);
                $berkas->ijazah = UploadFile::upload('uploads/berkas/ijazah', $request->file('ijazah'), $username);
            }

            if ($request->hasFile('kartu_pkh')) {
                DeleteFile::delete($berkas->kartu_pkh);
                $berkas->kartu_pkh = UploadFile::upload('uploads/berkas/kartu', $request->file('kartu_pkh'), $username);
            }

            if ($request->hasFile('pas_foto')) {
                DeleteFile::delete($berkas->pas_foto);
                $berkas->pas_foto = UploadFile::upload('uploads/berkas/pas_foto', $request->file('pas_foto'), $username);
            }

            // Pastikan tidak membuat instance baru
            $berkas->peserta_ppdb_id = $pesertaPpdb->id;

            // Simpan perubahan
            $berkas->save();

            DB::commit();

            return redirect()->route('data-berkas.index')->with('success', 'Data berkas berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }
}
