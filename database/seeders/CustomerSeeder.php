<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer; // Asegúrate de importar el modelo Customer
use App\Models\User;     // Asegúrate de importar el modelo User
use App\Models\Role;     // Asegúrate de importar el modelo Role
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios para los clientes
        $users = [
            [
                'document'=>'0000011111',
                'name' => 'Gomeok',
                'email' => 'xander@gmail.com',
                'password' => Hash::make('password1'), // Cambia la contraseña según sea necesario
            ],
            [
                'document'=>'2222233333',
                'name' => 'juan',
                'email' => 'juan@gmail.com',
                'password' => Hash::make('password2'),
            ],
        ];

        // Crear cada usuario y luego crear el customer asociado
        foreach ($users as $userData) {
            $user = User::create($userData); // Crear el usuario

            // Crear el customer asociado al usuario
            $customer = Customer::create([
                'user_id' => $user->id,
                'phone_number' => '123-456-7890', // Puedes cambiar este número por uno real o generar uno aleatorio
            ]);

            // Asignar un rol al cliente (por ejemplo, "customer")
            $role = Role::firstOrCreate(['name' => 'cliente']); // Asegúrate de que el rol "customer" exista

            // Asociar el usuario al rol en la tabla role_user
            $user->roles()->attach($role->id); 
        }
    }
}