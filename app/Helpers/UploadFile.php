<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class UploadFile
{
  public static function upload($storageLocation, $file, $namaSiswa)
  {
    $file_extension = $file->getClientOriginalExtension();
    // Format nama file dengan nama siswa dan timestamp
    $file_name = $namaSiswa . '_' . time() . '.' . $file_extension;

    // Upload file
    $file->move($storageLocation, $file_name);
    $file_url = url("/" . $storageLocation . "/" . $file_name);

    return $file_url;
  }
}
