<?php

namespace App\Models;

use App\Traits\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaPpdb extends Model
{
    use HasFactory, HashUuid;

    protected $table = 'peserta_ppdb';
    protected $fillable = [
        'user_id',
        'name',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kk',
        'nik',
        'no_akte_kelahiran',
        'status_pkh',
        'no_pkh',
        'asal_sekolah',
        'agama',
        'alamat',
        'tinggal_dengan',
        'anak_ke',
        'jml_saudara_kandung',
        'tinggi_badan',
        'berat_badan',
        'status'
    ];

    public function berkas()
    {
        return $this->hasOne(Berkas::class);
    }

    public function ortu()
    {
        return $this->hasOne(Ortu::class);
    }

    public function wali()
    {
        return $this->hasOne(Wali::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
