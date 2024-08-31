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
        return view('admin.data-berkas.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        $validated = $request->validate([
            'akte_kelahiran' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'kk' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'ktp_ortu' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'ijazah' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kartu_pkh' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'pas_foto' => 'required|file|mimes:jpg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $pesertaPpdb = PesertaPpdb::where('user_id', Auth::id())->firstOrFail();
            $namaSiswa = $pesertaPpdb->name;

            $akteKelahiranUrl = UploadFile::upload('uploads/berkas/akte', $request->file('akte_kelahiran'), $namaSiswa);
            $kkUrl = UploadFile::upload('uploads/berkas/kk', $request->file('kk'), $namaSiswa);
            $ktpOrtuUrl = UploadFile::upload('uploads/berkas/ktp', $request->file('ktp_ortu'), $namaSiswa);
            $ijazahUrl = $request->hasFile('ijazah') ? UploadFile::upload('uploads/berkas/ijazah', $request->file('ijazah'), $namaSiswa) : null;
            $kartuPkhUrl = $request->hasFile('kartu_pkh') ? UploadFile::upload('uploads/berkas/kartu', $request->file('kartu_pkh'), $namaSiswa) : null;
            $pasFotoUrl = UploadFile::upload('uploads/berkas/pas_foto', $request->file('pas_foto'), $namaSiswa);

            Berkas::create([
                'peserta_ppdb_id' => $pesertaPpdb->id,
                'akte_kelahiran' => $akteKelahiranUrl,
                'kk' => $kkUrl,
                'ktp_ortu' => $ktpOrtuUrl,
                'ijazah' => $ijazahUrl,
                'kartu_pkh' => $kartuPkhUrl,
                'pas_foto' => $pasFotoUrl,
            ]);

            DB::commit();

            return redirect()->route('data-berkas.index')->with('success', 'Data berkas berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
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

    public function update(Request $request, Berkas $berkas)
    {
        if (!Gate::allows('siswa-only')) {
            abort(403);
        }

        $validated = $request->validate([
            'akte_kelahiran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'ktp_ortu' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'ijazah' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kartu_pkh' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'pas_foto' => 'nullable|file|mimes:jpg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $pesertaPpdb = PesertaPpdb::where('user_id', Auth::id())->firstOrFail();
            $namaSiswa = $pesertaPpdb->name;

            if ($request->hasFile('akte_kelahiran')) {
                DeleteFile::delete($berkas->akte_kelahiran);
                $berkas->akte_kelahiran = UploadFile::upload('uploads/berkas/akte', $request->file('akte_kelahiran'), $namaSiswa);
            }

            if ($request->hasFile('kk')) {
                DeleteFile::delete($berkas->kk);
                $berkas->kk = UploadFile::upload('uploads/berkas/kk', $request->file('kk'), $namaSiswa);
            }

            if ($request->hasFile('ktp_ortu')) {
                DeleteFile::delete($berkas->ktp_ortu);
                $berkas->ktp_ortu = UploadFile::upload('uploads/berkas/ktp', $request->file('ktp_ortu'), $namaSiswa);
            }

            if ($request->hasFile('ijazah')) {
                DeleteFile::delete($berkas->ijazah);
                $berkas->ijazah = UploadFile::upload('uploads/berkas/ijazah', $request->file('ijazah'), $namaSiswa);
            }

            if ($request->hasFile('kartu_pkh')) {
                DeleteFile::delete($berkas->kartu_pkh);
                $berkas->kartu_pkh = UploadFile::upload('uploads/berkas/kartu', $request->file('kartu_pkh'), $namaSiswa);
            }

            if ($request->hasFile('pas_foto')) {
                DeleteFile::delete($berkas->pas_foto);
                $berkas->pas_foto = UploadFile::upload('uploads/berkas/pas_foto', $request->file('pas_foto'), $namaSiswa);
            }

            // Tidak perlu mengatur ulang nilai untuk kolom yang tidak diubah
            $berkas->peserta_ppdb_id = $pesertaPpdb->id;

            $berkas->save();

            DB::commit();

            return redirect()->route('data-berkas.index')->with('success', 'Data berkas berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }
}
