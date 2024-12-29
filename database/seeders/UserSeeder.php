<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        ]);

        // Crear un Paciente
        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@example.com',
            'password' => Hash::make('password123'), // Contraseña segura
            'role' => "Paciente",
        ]);
    }

}
