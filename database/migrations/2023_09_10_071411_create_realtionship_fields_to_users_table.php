<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtionshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('dataprofil_id')->nullable();
            $table->foreign('dataprofil_id')->references('id')->on('dataprofils');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['dataprofil_id']);
            $table->dropColumn('dataprofil_id');
        });
    }
}
