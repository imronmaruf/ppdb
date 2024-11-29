<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin\PpdbSetting;
use Illuminate\Support\Facades\Route;

class CheckPpdbOpen
{
    public function handle(Request $request, Closure $next)
    {
        $setting = PpdbSetting::first();

        if (!$setting || !$setting->is_open || now()->isAfter($setting->tanggal_akhir)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Pendaftaran PPDB sedang ditutup.'], 403);
            }

            // Jika rute saat ini adalah halaman registrasi, redirect ke halaman informasi
            if (Route::currentRouteName() === 'register') {
                return redirect()->route('ppdb.closed');
            }

            // Untuk rute lain yang memerlukan pendaftaran terbuka, tampilkan pesan error
            return redirect()->route('ppdb.closed')->with('error', 'Pendaftaran PPDB sedang ditutup.');
        }

        return $next($request);
    }
}
