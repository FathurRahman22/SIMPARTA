<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipFieldsToDataLainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_lains', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id', 'tag_fk_7115058')->references('id')->on('tags');
            //
        });
        // Schema::create('order_tickets', function (Blueprint $table) {
        //     $table->unsignedBigInteger('dataprofil_id')->nullable();
        //     $table->foreign('dataprofil_id', 'event_fk_1')->references('id')->on('dataprofils');
        // });
    }
}
