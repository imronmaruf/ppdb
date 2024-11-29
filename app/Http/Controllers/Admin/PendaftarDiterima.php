<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesertaPpdb;
use Illuminate\Http\Request;

class PendaftarDiterima extends Controller
{
    public function index()
    {
        $pesertaDiterima = PesertaPpdb::with(['ortu', 'wali'])
            ->where('status', 'diterima')
            ->get();

        return view('admin.data-pendaftar.diterima', compact('pesertaDiterima'));
    }
}
