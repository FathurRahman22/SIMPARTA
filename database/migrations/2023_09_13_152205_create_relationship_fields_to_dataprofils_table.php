<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipFieldsToDataprofilsTable extends Migration
{
    public function up()
    {
        Schema::table('dataprofils', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id', 'tag_fk_0311000')->references('id')->on('tags');
            //
        });
        // Schema::create('order_tickets', function (Blueprint $table) {
        //     $table->unsignedBigInteger('dataprofil_id')->nullable();
        //     $table->foreign('dataprofil_id', 'dataprofil_fk_1')->references('id')->on('dataprofils');
        // });
    }
}