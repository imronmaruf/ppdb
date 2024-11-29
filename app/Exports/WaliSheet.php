<?php

namespace App\Exports;

use App\Models\Wali;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WaliSheet implements FromQuery, WithTitle, WithHeadings, WithMapping
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
        return Wali::query()
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
        return 'Data Wali';
    }

    public function headings(): array
    {
        return [
            'Nama Wali',
            'Tahun Lahir',
            'Pendidikan',
            'Pekerjaan',
            'Alamat',
            'Created At',
            'Updated At'
        ];
    }

    public function map($wali): array
    {
        return [
            $wali->nama_wali,
            $wali->tahun_lahir,
            $wali->pendidikan,
            $wali->pekerjaan,
            $wali->alamat,
            $wali->created_at,
            $wali->updated_at,
        ];
    }
}
