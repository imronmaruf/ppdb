<?php

namespace App\Models;

use App\Traits\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory, HashUuid;

    protected $table = 'ortu';
    protected $fillable = [
        'peserta_ppdb_id',
        'nama_ayah',
        'nama_ibu',
        'alamat_ayah',
        'alamat_ibu',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'nik_ayah',
        'nik_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu'
    ];


    public function pesertaPpdb()
    {
        return $this->belongsTo(PesertaPpdb::class, 'peserta_ppdb_id', 'id');
    }
}
