<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un Administrador
        User::create([
            'name' => 'Anuar Rodríguez Medina',
            'email' => 'anuar@test.com',
            'password' => Hash::make('password123'), // Contraseña segura
            'role' => "Super Admin",
            'status' => 'activo', // Establecer como activo
        ]);
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Contraseña segura
            'role' => "Administrador",
        ]);

        // Crear un Psicólogo
        User::create([
            'name' => 'Psicólogo',
            'email' => 'psicologo@example.com',
            'password' => Hash::make('password123'), // Contraseña segura
            'role' => "Psicólogo",
            'status' => 'activo', // Establecer como activo
        ]);
    
        // Crear un Paciente con su relación en la tabla Patients
        $patientUser = User::create([
            'name' => 'Paciente',
            'email' => 'paciente@example.com',
            'password' => Hash::make('password123'), // Contraseña segura
            'role' => "Paciente",
            'status' => 'activo', // Establecer como activo
        ]);

        // Crear la relación en la tabla patients
        Patient::create([
            'usuario_id' => $patientUser->id,  // Relacionamos al paciente con el usuario
            'fecha_nacimiento' => '2000-01-01', // Ejemplo de fecha de nacimiento
            'genero' => 'Masculino',           // Ejemplo de género
            'direccion' => '123 Calle Falsa',  // Ejemplo de dirección
            'telefono' => '1234567890',        // Ejemplo de teléfono
            'tutor_nombre' => 'Juan Pérez',    // Ejemplo de tutor
            'tutor_relacion' => 'Padre',       // Ejemplo de relación del tutor
            'tutor_telefono' => '0987654321',  // Ejemplo de teléfono del tutor
            'historial_medico' => 'Sin antecedentes médicos.',
            'alergias' => 'Ninguna',
        ]);

        // Crear un Paciente con su relación en la tabla Patients
        $patientUser2 = User::create([
            'name' => 'Paciente 2',
            'email' => 'paciente2@example.com',
            'password' => Hash::make('password123'), // Contraseña segura
            'role' => "Paciente",
            'status' => 'inactivo', // Establecer como activo
        ]);

        // Crear la relación en la tabla patients
        Patient::create([
            'usuario_id' => $patientUser2->id,  // Relacionamos al paciente con el usuario
            'fecha_nacimiento' => '2000-01-01', // Ejemplo de fecha de nacimiento
            'genero' => 'Masculino',           // Ejemplo de género
            'direccion' => '123 Calle Falsa',  // Ejemplo de dirección
            'telefono' => '1234567890',        // Ejemplo de teléfono
            'tutor_nombre' => 'Juan Pérez',    // Ejemplo de tutor
            'tutor_relacion' => 'Padre',       // Ejemplo de relación del tutor
            'tutor_telefono' => '0987654321',  // Ejemplo de teléfono del tutor
            'historial_medico' => 'Sin antecedentes médicos.',
            'alergias' => 'Ninguna',
        ]);

       

    }
}
