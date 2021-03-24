<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('metodo_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('name');
            $table->string('description');
            $table->enum('status',['1','0'])->comment('1-> activa, 0-> inactiva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metodo_pagos');
    }
}
