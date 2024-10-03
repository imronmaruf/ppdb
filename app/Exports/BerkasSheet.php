<?php

namespace App\Exports;

use App\Models\Berkas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BerkasSheet implements FromQuery, WithTitle, WithHeadings, WithMapping
{
    protected $tahun;
    protected $status;

    public function __construct($tahun, $status)
    {
        $this->tahun = $tahun;
        $this->status = $status;
    }

    public function query()
    {
        return Berkas::query()
            ->whereHas('pesertaPpdb', function ($query) {
                $query->when($this->tahun, function ($q) {
                    return $q->whereYear('created_at', $this->tahun);
                })
                    ->when($this->status, function ($q) {
                        return $q->where('status', $this->status);
                    });
            });
    }

    public function title(): string
    {
        return 'Data Berkas';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Peserta PPDB ID',
            'Akte Kelahiran',
            'KK',
            'KTP Ortu',
            'Ijazah',
            'Kartu PKH',
            'Pas Foto',
            'Created At',
            'Updated At'
        ];
    }

    public function map($berkas): array
    {
        return [
            $berkas->id,
            $berkas->peserta_ppdb_id,
            $berkas->akte_kelahiran,
            $berkas->kk,
            $berkas->ktp_ortu,
            $berkas->ijazah,
            $berkas->kartu_pkh,
            $berkas->pas_foto,
            $berkas->created_at,
            $berkas->updated_at,
        ];
    }
}
