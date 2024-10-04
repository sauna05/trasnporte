<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role; // Importa el modelo Role
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un rol para el ADMIN
        $role = Role::firstOrCreate(['name' => 'admin']); 

        // Crear usuario ADMIN
        $user = User::create([
            'name' => "admin",
            'email' => "sauna05@gmail.com",
            'password' => Hash::make('12345678'),
            'document'=>'1122391241',
           
        ]);

        // Asociar usuario y rol
        $user->roles()->attach($role->id);
    }
}