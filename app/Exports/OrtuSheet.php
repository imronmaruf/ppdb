<?php

namespace App\Exports;

use App\Models\Ortu;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class OrtuSheet extends DefaultValueBinder implements FromQuery, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder
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
        return Ortu::query()
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
        return 'Data Orang Tua';
    }

    public function headings(): array
    {
        return [
            'Nama Ayah',
            'Nama Ibu',
            'Alamat Ayah',
            'Alamat Ibu',
            'Tempat Lahir Ayah',
            'Tanggal Lahir Ayah',
            'Tempat Lahir Ibu',
            'Tanggal Lahir Ibu',
            'NIK Ayah',
            'NIK Ibu',
            'Pendidikan Ayah',
            'Pendidikan Ibu',
            'Pekerjaan Ayah',
            'Pekerjaan Ibu',
            'Created At',
            'Updated At'
        ];
    }

    public function map($ortu): array
    {
        return [
            $ortu->nama_ayah,
            $ortu->nama_ibu,
            $ortu->alamat_ayah,
            $ortu->alamat_ibu,
            $ortu->tempat_lahir_ayah,
            $ortu->tanggal_lahir_ayah,
            $ortu->tempat_lahir_ibu,
            $ortu->tanggal_lahir_ibu,
            $ortu->nik_ayah,
            $ortu->nik_ibu,
            $ortu->pendidikan_ayah,
            $ortu->pendidikan_ibu,
            $ortu->pekerjaan_ayah,
            $ortu->pekerjaan_ibu,
            $ortu->created_at,
            $ortu->updated_at,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), ['K', 'L'])) { // Columns for NIK Ayah and NIK Ibu
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }

        // For all other cells, use the default behavior
        return parent::bindValue($cell, $value);
    }
}
