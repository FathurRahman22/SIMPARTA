<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipFieldsToFasilitasWisatasTable extends Migration
{
    public function up()
    {
        Schema::table('fasilitasWisatas', function (Blueprint $table) {
            $table->unsignedBigInteger('dataprofil_id')->nullable();
            $table->foreign('dataprofil_id', 'dataprofil_fk_-09173445')->references('id')->on('dataprofils');
            //
        });
        // Schema::create('order_tickets', function (Blueprint $table) {
        //     $table->unsignedBigInteger('dataprofil_id')->nullable();
        //     $table->foreign('dataprofil_id', 'dataprofil_fk_1')->references('id')->on('dataprofils');
        // });
    }
}
