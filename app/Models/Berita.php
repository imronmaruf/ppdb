<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kategori_berita_id',
        'judul',
        'slug',
        'isi',
        'gambar',
        'file',
        'status',
    ];

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id');
    }
}
