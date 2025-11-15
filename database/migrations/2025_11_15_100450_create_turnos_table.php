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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->string('titulo');
            $table->string('nombre')->nullable();
            $table->string('celular', 50)->nullable();
            $table->string('correo')->nullable();
            $table->string('dni', 50)->nullable();
            $table->enum('estado', ['libre', 'pendiente', 'confirmado', 'cancelado'])->default('libre');
            $table->text('comentario')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
