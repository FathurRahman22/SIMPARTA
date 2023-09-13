<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_paketWisata');
            $table->string('deskripsi_paketWisata')->nullable();
            // $table->string('kode_paket')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
