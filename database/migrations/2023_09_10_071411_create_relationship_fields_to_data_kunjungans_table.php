<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipFieldsToDataKunjungansTable extends Migration
{
    public function up()
    {
        Schema::table('data_kunjungans', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id', 'tag_fk_0311009')->references('id')->on('tags');
            //
        });
        Schema::table('dataprofils', function (Blueprint $table) {
            $table->unsignedBigInteger('data_kunjungan_id')->nullable();
            $table->foreign('data_kunjungan_id')->references('id')->on('data_kunjungans');
        });
        // Schema::create('order_tickets', function (Blueprint $table) {
        //     $table->unsignedBigInteger('dataprofil_id')->nullable();
        //     $table->foreign('dataprofil_id', 'dataprofil_fk_1')->references('id')->on('dataprofils');
        // });
    }
}
