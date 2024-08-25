<?php

namespace App\Models;

use App\Traits\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory, HashUuid;

    protected $table = 'berkas';
    protected $fillable = [
        'peserta_ppdb_id',
        'akte_kelahiran',
        'kk',
        'ktp_ortu',
        'ijazah',
        'kartu_pkh',
        'pas_foto'
    ];

    public function pesertaPpdb()
    {
        return $this->belongsTo(PesertaPpdb::class, 'peserta_ppdb_id');
    }
}
