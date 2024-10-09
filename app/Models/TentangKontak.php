<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKontak extends Model
{
    use HasFactory;

    protected $table = 'tentang_kontak';

    protected $fillable = [
        'konten_tentang',
        'foto',
        'alamat',
        'email',
        'no_telp',
        'wa_link'
    ];
}
