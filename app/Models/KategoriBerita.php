<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $fillable = [
        'name',
        'slug'
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id', 'id');
    }
}
