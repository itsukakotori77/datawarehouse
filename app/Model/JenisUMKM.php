<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisUMKM extends Model
{
    // Table
    protected $table = 'jenis_umkm';
    protected $primaryKey = 'Kode_Jenis';
    protected $fillable = [
        'Kode_Jenis',
        'Nama'
    ];
}
