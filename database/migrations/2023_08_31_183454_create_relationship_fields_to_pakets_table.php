<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipFieldsToPaketsTable extends Migration
{
    public function up()
    {
        Schema::table('pakets', function (Blueprint $table) {
            $table->unsignedBigInteger('dataprofil_id')->nullable();
            $table->foreign('dataprofil_id', 'dataprofil_fk_0311034')->references('id')->on('dataprofils');
            //
        });
        // Schema::create('order_tickets', function (Blueprint $table) {
        //     $table->unsignedBigInteger('dataprofil_id')->nullable();
        //     $table->foreign('dataprofil_id', 'dataprofil_fk_1')->references('id')->on('dataprofils');
        // });
    }
}
