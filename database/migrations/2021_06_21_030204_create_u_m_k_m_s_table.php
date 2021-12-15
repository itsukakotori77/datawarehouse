<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUMKMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('Kode_UMKM');
            $table->string('Nama');
            $table->string('Komoditi');
            $table->string('Sektor');
            $table->string('Alamat');
            $table->string('Tahun_Berdiri');
            $table->integer('Tenaga_Kerja');
            $table->integer('Aset');
            $table->float('Omzet');
            $table->string('Telepon');
            $table->string('Pemasaran');
            $table->integer('Kemacamatan_ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkm');
    }
}
