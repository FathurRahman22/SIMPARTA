<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtionshipFieldsToDataKunjungansTable extends Migration
{
    public function up()
    {
        Schema::table('data_kunjungans', function (Blueprint $table) {
            $table->unsignedBigInteger('dataprofil_id')->nullable();
            $table->foreign('dataprofil_id', 'dataprofil_fk_0311009')->references('id')->on('dataprofils');
            //
        });
        // Schema::create('order_tickets', function (Blueprint $table) {
        //     $table->unsignedBigInteger('dataprofil_id')->nullable();
        //     $table->foreign('dataprofil_id', 'dataprofil_fk_1')->references('id')->on('dataprofils');
        // });
    }
}
