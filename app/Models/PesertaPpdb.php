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
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
        'no_telp',
        'kk',
        'ijazah',
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
