<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver; // Asegúrate de importar el modelo Driver
use App\Models\Licence;
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
                'document'=>'3333399999',
                'name' => 'lionelMessi',
                'email' => 'messi05@gmail.com',
                'password' => Hash::make('password1'), // Cambia la contraseña según sea necesario
            ],
            [
                'document'=>'9999911111',
                'name' => 'Juandiego',
                'email' => 'juandiego@gmail.com',
                'password' => Hash::make('password2'),
            ],
        ];

        
        $license_id = 3;

        // Crear cada usuario y luego crear el driver asociado
        foreach ($users as $userData) {
            $user = User::create($userData);

            $driver = Driver::create([
                'user_id' => $user->id,
                'imagen' => null, 
                'license_id' => $license_id, 
                'experience' => rand(1, 10), 
                'availability' => 'disponible', // Disponibilidad por defecto
            ]);

           
            $role = Role::firstOrCreate(['name' => 'conductor']); 

            // Asociar el usuario al rol en la tabla role_user
            $user->roles()->attach($role->id);
        }
    }
}
