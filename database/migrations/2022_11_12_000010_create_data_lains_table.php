<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLainsTable extends Migration
{
    public function up()
    {
        Schema::create('data_lains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idproyek')->nullable();
            $table->bigInteger('nib')->nullable();
            $table->string('npwp')->nullable()->regex('/^\d+$/');
            $table->string('nama_perusahaan')->nullable();
            $table->string('statuspm')->nullable();
            $table->string('jenis_perusahaan')->nullable();
            $table->string('risiko_proyek')->nullable();
            $table->string('skala_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->integer('kbli');
            $table->string('judul_kbli')->nullable();
            $table->string('sektor')->nullable();
            $table->string('nama_user');
            $table->bigInteger('nik')->unsigned()->nullable();
            $table->string('email');
            $table->string('telp', 20);
            $table->string('mesin_peralatan')->nullable();
            $table->string('mesin_import')->nullable();
            $table->string('pembelian_tanah')->nullable();
            $table->string('bangunan')->nullable();
            $table->string('modal_kerja')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('investasi')->nullable();
            $table->integer('laki_laki')->nullable();
            $table->integer('perempuan')->nullable();
            $table->integer('tki');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
