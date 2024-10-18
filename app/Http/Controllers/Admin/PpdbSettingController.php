<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\PpdbSetting;
use App\Http\Controllers\Controller;

class PpdbSettingController extends Controller
{
    public function index()
    {
        $setting = PpdbSetting::firstOrNew();
        return view('admin.ppdb-settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
        ]);

        $setting = PpdbSetting::firstOrNew();
        $setting->fill($request->only(['tanggal_mulai', 'tanggal_akhir']));
        $setting->save();

        return redirect()->route('ppdb-settings.index')->with('success', 'Pengaturan PPDB berhasil diperbarui.');
    }

    public function toggleStatus()
    {
        $setting = PpdbSetting::firstOrNew();
        $setting->is_open = !$setting->is_open;
        $setting->save();

        $status = $setting->is_open ? 'dibuka' : 'ditutup';
        return redirect()->route('ppdb-settings.index')->with('success', "Pendaftaran PPDB telah $status.");
    }
}
