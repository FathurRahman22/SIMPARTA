<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFasilitasWisatasTable extends Migration
{
    public function up()
    {
        Schema::table('fasilitasWisatas', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id', 'tag_fk_7115057')->references('id')->on('tags');
        });
    }
}
