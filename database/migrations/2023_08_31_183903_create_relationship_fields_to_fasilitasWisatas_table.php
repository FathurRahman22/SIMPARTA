<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipFieldsToFasilitasWisatasTable extends Migration
{
    public function up()
    {
       
Schema::table('fasilitasWisatas', function (Blueprint $table) {
    $table->unsignedBigInteger('tag_id')->nullable();
    $table->foreign('tag_id', 'tag_fk_09173446')->references('id')->on('tags');
    //
});
// Schema::create('order_tickets', function (Blueprint $table) {
//     $table->unsignedBigInteger('dataprofil_id')->nullable();
//     $table->foreign('dataprofil_id', 'dataprofil_fk_1')->references('id')->on('dataprofils');
// });
}
}