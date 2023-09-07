<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becados', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('nombre', 35);
            $table->string('ApellidoP', 20);
            $table->string('ApellidoM', 20);
            $table->date('fecha');
            $table->string('LugarN', 50);
            $table->string('DireccionP', 200);
            $table->string('DireccionA', 200);
            $table->string('TelefonoC', 50);
            $table->string('Correo', 50);
            $table->string('NombreP', 50);
            $table->string('NombreM', 50);
            $table->double('NumHermanos', 2, 0);
            $table->string('LugarFam', 20);
            $table->year('AnoEntradaVilla');
            $table->year('AnoGradSec');
            $table->year('AnoGradBach');
            $table->string('TrabajoAct', 35);
            $table->string('Facebook', 30);
            $table->string('Instagram', 30);
            $table->string('OtraRed', 30)->nullable();
            $table->string('Carrera', 80);
            $table->string('Universidad', 80);
            $table->string('DireccionUni', 250);
            $table->string('Duracion', 20);
            $table->string('Banco', 20);
            $table->string('CuentaBanc', 50);
            $table->enum("Sistema", ["Bimestral", "Trimestral", "Cuatrimestral", "Semestral"]);
            $table->date('Anoiniciobeca');
            $table->string('ContactoEmergencia', 50);
            $table->string('TelefonoEmergencia', 20);
            $table->date('AnodeGraduacion')->nullable();
            $table->date('FechadeBaja')->nullable();
            $table->string('Logros_recibidos', 20)->nullable();
            $table->enum("status", ["Activo", "Baja", "Graduado"]);
            $table->string('Foto_path', 60);
            $table->unsignedBigInteger('programa_id');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete("cascade");
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete("cascade");
            $table->timestamps();
        });
    }
    /* 

  




  
  
  
  
 */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('becados');
    }
};