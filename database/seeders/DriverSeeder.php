<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver; // Asegúrate de importar el modelo Driver
use App\Models\User;   // Asegúrate de importar el modelo User
use App\Models\Role;   // Asegúrate de importar el modelo Role
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios para los conductores
        $users = [
            [
                'name' => 'Alexander Sauna',
                'email' => 'alexandersauna05@gmail.com',
                'password' => Hash::make('password1'), // Cambia la contraseña según sea necesario
            ],
            [
                'name' => 'Sauna',
                'email' => 'sauna@gmail.com',
                'password' => Hash::make('password2'),
            ],
        ];

        // Crear cada usuario y luego crear el driver asociado
        foreach ($users as $userData) {
            $user = User::create($userData); // Crear el usuario

            // Crear el driver asociado al usuario
            $driver = Driver::create([
                'user_id' => $user->id,
                'imagen' => null, // Puedes agregar una URL de imagen si lo deseas
                'license' => 'LIC-' . strtoupper(substr(md5($user->email), 0, 6)), // Generar una licencia única
                'experience' => rand(1, 10), // Generar años de experiencia aleatorios entre 1 y 10
                'availability' => true, // Disponibilidad por defecto
            ]);

            // Asignar un rol al conductor (por ejemplo, "driver")
            $role = Role::firstOrCreate(['name' => 'conductor']); // Asegúrate de que el rol "driver" exista

            // Asociar el usuario al rol en la tabla role_user
            $user->roles()->attach($role->id);
        }
    }
}