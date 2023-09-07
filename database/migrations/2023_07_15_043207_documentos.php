<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('nombre', 200)->nullable();
            $table->string('Foto_path', 60);
            $table->unsignedBigInteger('becado_id');
            $table->foreign('becado_id')->references('id')->on('becados')->onDelete("cascade");
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
