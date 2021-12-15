<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $table = 'tests';
    protected $fillable = [
        'Kode_UMKM',
        'Nama',
        'Komoditi',
        'Sektor',
    ];

}
