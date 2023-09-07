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
        Schema::create('detallegastos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('becado_id');
            $table->double('Monto');
            $table->unsignedBigInteger('gasto_id');
            $table->foreign('becado_id')->references('id')->on('becados')->onDelete("cascade");
            $table->foreign('gasto_id')->references('id')->on('gastos')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallegastos');
    }
};
