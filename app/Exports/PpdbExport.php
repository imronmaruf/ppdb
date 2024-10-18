<?php

namespace App\Exports;

use App\Models\PesertaPpdb;
use App\Models\Ortu;
use App\Models\Wali;
use App\Models\Berkas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class PpdbExport implements WithMultipleSheets
{
    protected $tahun;
    protected $status;

    public function __construct($tahun, $status)
    {
        $this->tahun = $tahun;
        $this->status = $status;
    }

    public function sheets(): array
    {
        return [
            new PesertaPpdbSheet($this->tahun, $this->status),
            new OrtuSheet($this->tahun, $this->status),
            new WaliSheet($this->tahun, $this->status),
            new BerkasSheet($this->tahun, $this->status),
        ];
    }
}

class PesertaPpdbSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use CommonSheetTrait;

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
        ];
    }

    public function map($peserta): array
    {
        return [
            $peserta->name,
            $peserta->jenis_kelamin,
            $peserta->tempat_lahir,
            $peserta->tanggal_lahir,
            $this->formatNumber($peserta->kk),
            $this->formatNumber($peserta->nik),
            $this->formatNumber($peserta->no_akte_kelahiran),
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
        ];
    }
}

class OrtuSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use CommonSheetTrait;

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
            'Nama Peserta',
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
        ];
    }

    public function map($ortu): array
    {
        return [
            $ortu->pesertaPpdb->name,
            $ortu->nama_ayah,
            $ortu->nama_ibu,
            $ortu->alamat_ayah,
            $ortu->alamat_ibu,
            $ortu->tempat_lahir_ayah,
            $ortu->tanggal_lahir_ayah,
            $ortu->tempat_lahir_ibu,
            $ortu->tanggal_lahir_ibu,
            $this->formatNumber($ortu->nik_ayah),
            $this->formatNumber($ortu->nik_ibu),
            $ortu->pendidikan_ayah,
            $ortu->pendidikan_ibu,
            $ortu->pekerjaan_ayah,
            $ortu->pekerjaan_ibu,
        ];
    }
}

class WaliSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use CommonSheetTrait;

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
            'Nama Peserta',
            'Nama Wali',
            'Tahun Lahir',
            'Pendidikan',
            'Pekerjaan',
            'Alamat',
        ];
    }

    public function map($wali): array
    {
        return [
            $wali->pesertaPpdb->name,
            $wali->nama_wali,
            $wali->tahun_lahir,
            $wali->pendidikan,
            $wali->pekerjaan,
            $wali->alamat,
        ];
    }
}

class BerkasSheet implements FromQuery, WithTitle, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use CommonSheetTrait;

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
            'Nama Peserta',
            'Akte Kelahiran',
            'KK',
            'KTP Ortu',
            'Ijazah',
            'Kartu PKH',
            'Pas Foto',
        ];
    }

    public function map($berkas): array
    {
        return [
            $berkas->pesertaPpdb->name,
            $berkas->akte_kelahiran,
            $berkas->kk,
            $berkas->ktp_ortu,
            $berkas->ijazah,
            $berkas->kartu_pkh,
            $berkas->pas_foto,
        ];
    }
}

trait CommonSheetTrait
{
    protected $tahun;
    protected $status;

    public function __construct($tahun, $status)
    {
        $this->tahun = $tahun;
        $this->status = $status;
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

    protected function formatNumber($number)
    {
        return \PhpOffice\PhpSpreadsheet\Shared\StringHelper::formatNumber($number);
    }
}
