<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class UploadFile
{
  public static function upload($storageLocation, $file, $username)
  {
    // Ambil ekstensi file
    $file_extension = $file->getClientOriginalExtension();
    // Buat nama file unik dengan menambahkan uniqid
    $file_name = $username . '_' . uniqid() . '.' . $file_extension;

    // Upload file ke folder publik
    $file->move(public_path($storageLocation), $file_name);
    $file_url = url("/" . $storageLocation . "/" . $file_name);

    return $file_url;
  }
}
