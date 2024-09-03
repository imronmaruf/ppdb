<?php

namespace App\Http\Controllers\Landing;

use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TentangKontak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TentangKontakController extends Controller
{
    public function index()
    {
        $dataTentangKontak = TentangKontak::first();
        return view('admin.landing-page.tentang-kontak.index', compact('dataTentangKontak'));
    }

    public function create()
    {
        return view('admin.landing-page.tentang-kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'konten_tentang' => 'required',
                'foto' => 'required|file|mimes:jpg,png,jpeg|max:2048',
                'alamat' => 'required',
                'no_telp' => 'required',
                'wa_link' => 'required|url',
            ],
            [
                'konten_tentang.required' => 'Konten harus diisi',
                'foto.required' => 'Foto harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'foto.file' => 'Foto harus berupa file JPEG, PNG, jpg ',
                'no_telp.required' => 'No. Telp harus diisi',
                'wa_link.required' => 'WA Link harus diisi',
                'wa_link.url' => 'WA Link harus berupa URL',

            ]
        );

        try {
            DB::beginTransaction();

            $username = Auth::user()->name;
            // FOTO
            $fotoUrl = UploadFile::upload('landing/img', $request->file('foto'), $username);

            TentangKontak::create([
                'konten_tentang' => $request->konten_tentang,
                'foto' => $fotoUrl,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'wa_link' => $request->wa_link,
            ]);

            DB::commit();
            Session::flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('tentang-kontak.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $dataTentangKontak = TentangKontak::find($id);
        return view('admin.landing-page.tentang-kontak.edit', compact('dataTentangKontak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'konten_tentang' => 'required',
                'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
                'alamat' => 'required',
                'no_telp' => 'required',
                'wa_link' => 'required|url',
            ]
        );

        try {
            DB::beginTransaction();

            $username = Auth::user()->name;
            // FOTO
            $fotoUrl = $request->hasFile('foto') ? UploadFile::upload('landing/img', $request->file('foto'), $username) : TentangKontak::find($id)->foto;

            TentangKontak::find($id)->update([
                'konten_tentang' => $request->konten_tentang,
                'foto' => $fotoUrl,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'wa_link' => $request->wa_link,
            ]);

            DB::commit();
            Session::flash('success', 'Data berhasil diubah');
            return redirect()->route('tentang-kontak.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
