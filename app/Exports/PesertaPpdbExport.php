<?php

namespace App\Exports;

use App\Models\PesertaPpdb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class PesertaPpdbExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    protected $tahun;
    protected $status;

    public function __construct($tahun, $status)
    {
        $this->tahun = $tahun;
        $this->status = $status;
    }

    public function collection()
    {
        return PesertaPpdb::with(['ortu', 'wali', 'berkas'])
            ->when($this->tahun, function ($query) {
                return $query->whereYear('created_at', $this->tahun);
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tahun Pendaftaran',
            'Status',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'NIK',
            'Agama',
            'Alamat',
            'Nomor Telepon',
            'Nama Ayah',
            'Nama Ibu',
            'Alamat Ayah',
            'Alamat Ibu',
            'Nama Wali',
            'Tahun Lahir Wali',
            'Pekerjaan Wali',
            'Alamat Wali',
            'Akte Kelahiran',
            'KK',
            'KTP Ortu',
            'Ijazah',
            'Kartu PKH',
            'Pas Foto'
        ];
    }

    public function map($peserta): array
    {
        return [
            $peserta->created_at->format('Y'),
            $peserta->status,
            $peserta->name,
            $peserta->jenis_kelamin,
            $peserta->tempat_lahir,
            $peserta->tanggal_lahir,
            \PhpOffice\PhpSpreadsheet\Shared\StringHelper::formatNumber($peserta->nik),
            \PhpOffice\PhpSpreadsheet\Shared\StringHelper::formatNumber($peserta->kk),
            \PhpOffice\PhpSpreadsheet\Shared\StringHelper::formatNumber($peserta->no_akte_kelahiran),
            $peserta->status_pkh,
            $peserta->agama,
            $peserta->alamat,
            $peserta->no_telp,
            $peserta->ortu->nama_ayah ?? '',
            $peserta->ortu->nama_ibu ?? '',
            $peserta->ortu->alamat_ayah ?? '',
            $peserta->ortu->alamat_ibu ?? '',
            $peserta->wali->nama_wali ?? '',
            $peserta->wali->tahun_lahir ?? '',
            $peserta->wali->pekerjaan ?? '',
            $peserta->wali->alamat ?? '',
            $peserta->berkas->akte_kelahiran ?? '',
            $peserta->berkas->kk ?? '',
            $peserta->berkas->ktp_ortu ?? '',
            $peserta->berkas->ijazah ?? '',
            $peserta->berkas->kartu_pkh ?? '',
            $peserta->berkas->pas_foto ?? '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '008000'],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $lastColumn = $sheet->getHighestColumn();
                $lastRow = $sheet->getHighestRow();

                // Auto-fit columns
                foreach (range('A', $lastColumn) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // Add borders to all cells
                $sheet->getStyle('A1:' . $lastColumn . $lastRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);

                // Set NIK column (G) to Text format
                $sheet->getStyle('G2:G' . $lastRow)->getNumberFormat()
                    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

                // Reapply the NIK values as text
                for ($row = 2; $row <= $lastRow; $row++) {
                    $cellValue = $sheet->getCell('G' . $row)->getValue();
                    $sheet->setCellValueExplicit('G' . $row, $cellValue, DataType::TYPE_STRING);
                }
            },
        ];
    }
}
