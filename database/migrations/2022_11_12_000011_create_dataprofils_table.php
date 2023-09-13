<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataprofilsTable extends Migration
{
    public function up()
    {
        Schema::create('dataprofils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('daftar_usaha_pariwisata');
            $table->string('daftar_sub_jenis_usaha');
            $table->string('name');
            $table->string('alamat')->nullable();
            $table->string('description')->nullable();
            // $table->string('kategori');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();   
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->softDeletes();
        });
        // Create a new table to store clusters
        Schema::create('clusters', function (Blueprint $table) {
            $table->id();
            $table->string('cluster_name'); // You can change this to match your needs
            $table->integer('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop the clusters table if needed
        Schema::dropIfExists('clusters');

        Schema::dropIfExists('dataprofils');
    }
}