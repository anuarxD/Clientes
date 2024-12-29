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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); // Relación con usuarios
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('direccion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('tutor_nombre')->nullable(); // Datos del tutor
            $table->string('tutor_relacion', 50)->nullable();
            $table->string('tutor_telefono', 20)->nullable();
            $table->text('historial_medico')->nullable();
            $table->text('alergias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
