<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbSetting extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal_mulai', 'tanggal_akhir', 'is_open'];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
        'is_open' => 'boolean',
    ];

    public static function isOpen()
    {
        $setting = self::first();
        if (!$setting) {
            return false;
        }
        return $setting->is_open;
    }
}
