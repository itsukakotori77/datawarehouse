<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reporting extends Model
{
    protected $table = 'reporting';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Kode_UMKM',
        'Jenis_ID',
        'Kecamatan_ID'
    ];
    
}
