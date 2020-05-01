<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento',20)->unique();
            $table->bigInteger('tipo_documento');
            $table->bigInteger('tipo_genero');
            $table->string('primer_nombre',50);
            $table->string('segundo_nombre',50)->nullable();
            $table->string('tercer_nombre',50)->nullable();
            $table->string('primer_apellido',50);
            $table->string('segundo_apellido',50);
            $table->date('fecha_nacimiento',50);
            $table->string('correo_electronico',50)->nullable();
            $table->string('ubigeo',50)->nullable();
            $table->string('nacionalidad',50)->nullable();
            $table->bigInteger('especialidad')->nullable();
            $table->bigInteger('grado_academico')->nullable();
            $table->bigInteger('parentesco')->nullable();
            $table->bigInteger('codigo_matricula')->nullable();
            $table->string('codigo_siagie',20)->nullable();
            $table->string('estado_academico',50)->nullable();
            $table->string('estado_matriculado',50)->nullable();
            $table->string('imagen',100)->nullable();
            $table->boolean('estado',50)->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}