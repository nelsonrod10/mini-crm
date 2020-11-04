<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('compania_id')->unsigned();
            $table->string('primer_nombre')->required();
            $table->string('apellido')->required();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
            $table->foreign('compania_id')->references('id')->on('companias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
