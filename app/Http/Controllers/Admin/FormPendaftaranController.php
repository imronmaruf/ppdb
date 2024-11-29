<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\PesertaPpdb;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        //logic untuk menghitung umur harus 7 tahun
        $birthDate = Carbon::parse($request->input('tanggal_lahir'));
        $age = $birthDate->age;

        if ($age < 7) {
            return redirect()->back()->withErrors(['error' => 'Umur tidak memenuhi syarat, harus 7 tahun'])->withInput();
        }

        // Validasi input dengan kondisi
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'kk' => 'required|string|max:20',
                'nik' => 'required|string|max:16|unique:peserta_ppdb,nik',
                'no_akte_kelahiran' => 'required|string|max:20',
                'status_pkh' => 'required|in:ada,tidak',
                'no_pkh' => $request->input('status_pkh') === 'ada' ? 'required|string' : 'nullable',
                'asal_sekolah' => 'nullable|string|max:255',
                'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
                // 'alamat' => 'required|string|max:500',
                'alamat' => [
                    'required',
                    'string',
                    'max:500',
                    function ($attribute, $value, $fail) {
                        if (!Str::contains(Str::lower($value), 'dewantara')) {
                            $fail('Alamat harus berada di Kecamatan Dewantara.');
                        }
                    },
                ],
                'tinggal_dengan' => 'required|string|max:255',
                'no_telp' => 'required|string|max:20',
                'anak_ke' => 'required|string',
                'jml_saudara_kandung' => 'required|string|max:2',
                'tinggi_badan' => 'required|numeric|min:0',
                'berat_badan' => 'required|numeric|min:0',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'tempat_lahir.required' => 'Tempat lahir harus diisi',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'kk.required' => 'No. KK harus diisi',
                'nik.required' => 'NIK harus diisi',
                'no_akte_kelahiran.required' => 'No. Akte Kelahiran harus diisi',
                'no_pkh.required' => 'Nomor PKH wajib diisi jika status PKH ada.',
                'alamat.required' => 'Alamat harus diisi',
                'jml_saudara_kandung.required' => 'Jumlah saudara kandung harus diisi',
                'tinggi_badan.required' => 'Tinggi badan harus diisi',
                'berat_badan.required' => 'Berat badan harus diisi',
                'nik.unique' => 'NIK sudah terdaftar',
                'no_pkh.unique' => 'No. PKH sudah terdaftar',
                'no_akte_kelahiran.unique' => 'No. Akte Kelahiran sudah terdaftar',
                'kk.unique' => 'No. KK sudah terdaftar',
                'nik.max' => 'NIK tidak boleh lebih dari 16 karakter',
                'no_pkh.max' => 'No. PKH tidak boleh lebih dari 20 karakter',
                'no_akte_kelahiran.max' => 'No. Akte Kelahiran tidak boleh lebih dari 20 karakter',
                'kk.max' => 'No. KK tidak boleh lebih dari 20 karakter',
                'nik.min' => 'NIK tidak boleh kurang dari 16 karakter',
                'no_pkh.min' => 'No. PKH tidak boleh kurang dari 20 karakter',
                'no_akte_kelahiran.min' => 'No. Akte Kelahiran tidak boleh kurang dari 20 karakter',
                'kk.min' => 'No. KK tidak boleh kurang dari 20 karakter',
                'tinggi_badan.min' => 'Tinggi badan tidak boleh kurang dari 0',
                'berat_badan.min' => 'Berat badan tidak boleh kurang dari 0',
                'agama.in' => 'Agama harus dipilih',
                'status_pkh.in' => 'Status PKH harus dipilih',
                'jenis_kelamin.in' => 'Jenis kelamin harus dipilih',
                'tinggal_dengan.required' => 'Tinggal dengan harus diisi',
                'anak_ke.required' => 'Anak ke harus diisi',
                'no_telp.required' => 'No. Telepon harus diisi',
            ]
        );

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
            $pesertaPpdb->no_pkh = $request->input('status_pkh') === 'ada' ? $validated['no_pkh'] : null; // jika status pkh ada maka no_pkh wajib diisi. jika tidak boleh null
            $pesertaPpdb->asal_sekolah = $validated['asal_sekolah'];
            $pesertaPpdb->agama = $validated['agama'];

            $pesertaPpdb->alamat = $validated['alamat'];
            $pesertaPpdb->tinggal_dengan = $validated['tinggal_dengan'];
            $pesertaPpdb->no_telp = $validated['no_telp'];
            $pesertaPpdb->anak_ke = $validated['anak_ke'];
            $pesertaPpdb->jml_saudara_kandung = $validated['jml_saudara_kandung'];
            $pesertaPpdb->tinggi_badan = $validated['tinggi_badan'];
            $pesertaPpdb->berat_badan = $validated['berat_badan'];
            $pesertaPpdb->status = 'verifikasi'; // Status default
            // Simpan data ke database
            $pesertaPpdb->save();

            // Update nama di tabel users
            $user = Auth::user();
            if ($user) {
                $user->name = $validated['name'];
                $user->save();
            }
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
        $birthDate = Carbon::parse($request->input('tanggal_lahir'));
        $age = $birthDate->age;

        if ($age < 7) {
            return redirect()->back()->withErrors(['error' => 'Umur tidak memenuhi syarat, harus 7 tahun'])->withInput();
        }

        // Validasi input dengan kondisi
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'kk' => 'required|string|max:20',
                'nik' => 'required|string|max:16|unique:peserta_ppdb,nik,' . $id,
                'no_akte_kelahiran' => 'required|string|max:20|unique:peserta_ppdb,no_akte_kelahiran,' . $id,
                'no_akte_kelahiran' => 'required|string|max:20',
                'status_pkh' => 'required|in:ada,tidak',
                'no_pkh' => $request->input('status_pkh') === 'ada' ? 'required|string|max:20' : 'nullable|string|max:20',
                'asal_sekolah' => 'nullable|string|max:255',
                'agama' => 'required|in:islam,katolik,protestan,hindu,buddha,konghucu',
                // 'alamat' => 'required|string|max:500',
                'alamat' => [
                    'required',
                    'string',
                    'max:500',
                    function ($attribute, $value, $fail) {
                        if (!Str::contains(Str::lower($value), 'dewantara')) {
                            $fail('Alamat harus berada di Kecamatan Dewantara.');
                        }
                    },
                ],
                'tinggal_dengan' => 'required|string|max:255',
                'no_telp' => 'required|string|max:20',
                'anak_ke' => 'required|string',
                'jml_saudara_kandung' => 'required|string|max:2',
                'tinggi_badan' => 'required|numeric|min:0',
                'berat_badan' => 'required|numeric|min:0',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'tempat_lahir.required' => 'Tempat lahir harus diisi',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'kk.required' => 'No. KK harus diisi',
                'nik.required' => 'NIK harus diisi',
                'no_akte_kelahiran.required' => 'No. Akte Kelahiran harus diisi',
                'no_pkh.required' => 'No. PKH harus diisi',
                'no_telp.required' => 'No. Telepon harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'jml_saudara_kandung.required' => 'Jumlah saudara kandung harus diisi',
                'tinggi_badan.required' => 'Tinggi badan harus diisi',
                'berat_badan.required' => 'Berat badan harus diisi',
                'nik.unique' => 'NIK sudah terdaftar',
                'no_pkh.unique' => 'No. PKH sudah terdaftar',
                'no_akte_kelahiran.unique' => 'No. Akte Kelahiran sudah terdaftar',
                'kk.unique' => 'No. KK sudah terdaftar',
                'nik.max' => 'NIK tidak boleh lebih dari 16 karakter',
                'no_pkh.max' => 'No. PKH tidak boleh lebih dari 20 karakter',
                'no_akte_kelahiran.max' => 'No. Akte Kelahiran tidak boleh lebih dari 20 karakter',
                'kk.max' => 'No. KK tidak boleh lebih dari 20 karakter',
                'nik.min' => 'NIK tidak boleh kurang dari 16 karakter',
                'no_pkh.min' => 'No. PKH tidak boleh kurang dari 20 karakter',
                'no_akte_kelahiran.min' => 'No. Akte Kelahiran tidak boleh kurang dari 20 karakter',
                'kk.min' => 'No. KK tidak boleh kurang dari 20 karakter',
                'tinggi_badan.min' => 'Tinggi badan tidak boleh kurang dari 0',
                'berat_badan.min' => 'Berat badan tidak boleh kurang dari 0',
                'agama.in' => 'Agama harus dipilih',
                'status_pkh.in' => 'Status PKH harus dipilih',
                'jenis_kelamin.in' => 'Jenis kelamin harus dipilih',
                'tinggal_dengan.required' => 'Tinggal dengan harus diisi',
                'anak_ke.required' => 'Anak ke harus diisi',
            ]
        );

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
            // $pesertaPpdb->no_pkh = $validated['no_pkh'];
            $pesertaPpdb->no_pkh = $request->input('status_pkh') === 'ada' ? $validated['no_pkh'] : null;
            $pesertaPpdb->asal_sekolah = $validated['asal_sekolah'];
            $pesertaPpdb->agama = $validated['agama'];
            $pesertaPpdb->alamat = $validated['alamat'];
            $pesertaPpdb->tinggal_dengan = $validated['tinggal_dengan'];
            $pesertaPpdb->no_telp = $validated['no_telp'];
            $pesertaPpdb->anak_ke = $validated['anak_ke'];
            $pesertaPpdb->jml_saudara_kandung = $validated['jml_saudara_kandung'];
            $pesertaPpdb->tinggi_badan = $validated['tinggi_badan'];
            $pesertaPpdb->berat_badan = $validated['berat_badan'];

            // Simpan perubahan ke database
            $pesertaPpdb->save();

            // Update nama di tabel users
            $user = User::find($pesertaPpdb->user_id);
            if ($user) {
                $user->name = $validated['name'];
                $user->save();
            }

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
