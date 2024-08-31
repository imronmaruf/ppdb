<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class DeleteFile
{
  public static function delete($fileUrl)
  {
    // Ubah URL menjadi path file yang benar
    $filePath = public_path(str_replace(url('/'), '', $fileUrl));

    // Hapus file jika ada
    if (File::exists($filePath)) {
      return File::delete($filePath);
    }

    return false;
  }
}
