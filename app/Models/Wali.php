<?php

namespace App\Models;

use App\Traits\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory, HashUuid;

    protected $table = 'wali';
    protected $fillable = [
        'peserta_ppdb_id',
        'nama_wali',
        'tahun_lahir',
        'pendidikan',
        'pekerjaan',
        'alamat'
    ];

    public function pesertaPpdb()
    {
        return $this->belongsTo(PesertaPpdb::class, 'peserta_ppdb_id');
    }
}
