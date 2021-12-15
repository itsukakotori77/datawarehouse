<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    // Table
    protected $table = 'umkm';
    protected $primaryKey = 'Kode_UMKM';
    protected $fillable = [
        'Kode_UMKM',
        'Nama',
        'Komoditi',
        'Sektor',
        'Alamat',
        'Tahun_Berdiri',
        'Tenaga_Kerja',
        'Aset',
        'Omzet',
        'Telepon',
        'Pemasaran',
        'Tanggal',
        'Jenis_ID',
        'Kecamatan_ID'
    ];
}
