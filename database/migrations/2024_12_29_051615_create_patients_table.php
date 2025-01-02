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
            $table->id(); // Llave primaria
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Establece la relación y la eliminación en cascada
            $table->date('fecha_nacimiento')->nullable(); // Fecha de nacimiento
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro'])->nullable(); // Género
            $table->string('direccion', 255)->nullable(); // Dirección
            $table->string('telefono', 20)->nullable(); // Teléfono
            $table->string('tutor_nombre', 255)->nullable(); // Nombre del tutor
            $table->string('tutor_relacion', 50)->nullable(); // Relación del tutor
            $table->string('tutor_telefono', 20)->nullable(); // Teléfono del tutor
            $table->text('historial_medico')->nullable(); // Historial médico
            $table->text('alergias')->nullable(); // Alergias
            $table->timestamps(); // created_at y updated_at
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
