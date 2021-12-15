<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'Kode_Kecamatan';
    protected $fillable = [
        'Kode_Kecamatan',
        'Nama'
    ];
}
