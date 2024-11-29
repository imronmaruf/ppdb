<?php

// app/Http/ViewComposer/PesertaPpdbComposer.php
namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\PesertaPpdb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PesertaPpdbComposer
{
  /**
   * Bind data to the view.
   *
   * @param  \Illuminate\View\View  $view
   * @return void
   */
  public function compose(View $view)
  {
    $user = Auth::user();
    $jumlahPesertaVerifikasi = 0;

    if ($user && Gate::allows('admin-only', $user)) {
      // Hanya hitung jumlah peserta PPDB yang telah diverifikasi untuk admin
      $jumlahPesertaVerifikasi = PesertaPpdb::where('status', 'verifikasi')->count();
    }

    $view->with('jumlahPesertaVerifikasi', $jumlahPesertaVerifikasi);
  }
}
