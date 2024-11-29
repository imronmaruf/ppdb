<?php

namespace App\Exports;

use App\Models\PesertaPpdb;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaPpdbSheet implements FromQuery, WithTitle, WithHeadings, WithMapping
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
        return PesertaPpdb::query()
            ->when($this->tahun, function ($query) {
                return $query->whereYear('created_at', $this->tahun);
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            });
    }

    public function title(): string
    {
        return 'Data Peserta';
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'KK',
            'NIK',
            'No Akte Kelahiran',
            'Status PKH',
            'No PKH',
            'Asal Sekolah',
            'Agama',
            'Alamat',
            'Tinggal Dengan',
            'No Telp',
            'Anak Ke',
            'Jumlah Saudara Kandung',
            'Tinggi Badan',
            'Berat Badan',
            'Status',
            'Created At',
            'Updated At'
        ];
    }

    public function map($peserta): array
    {
        return [
            $peserta->name,
            $peserta->jenis_kelamin,
            $peserta->tempat_lahir,
            $peserta->tanggal_lahir,
            $peserta->kk,
            $peserta->nik,
            $peserta->no_akte_kelahiran,
            $peserta->status_pkh,
            $peserta->no_pkh,
            $peserta->asal_sekolah,
            $peserta->agama,
            $peserta->alamat,
            $peserta->tinggal_dengan,
            $peserta->no_telp,
            $peserta->anak_ke,
            $peserta->jml_saudara_kandung,
            $peserta->tinggi_badan,
            $peserta->berat_badan,
            $peserta->status,
            $peserta->created_at,
            $peserta->updated_at,
        ];
    }
}
