<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetos', function (Blueprint $table) {
            $table->increments('ObjectId');
            $table->timestamps();
            $table->integer('incident_id')->unsigned();
            $table->foreign('incident_id')->references('id')->on('incidents');
            $table->string('nombre');
            $table->integer('cantidadObjeto');
            $table->string('descripcionObjeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetos');
    }
}
