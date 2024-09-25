<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Agregar registros de prueba
        \App\Models\Vehicle::create([
            'type' => 'Camión',
            'capacity' => 10000, // Capacidad en kg
            'status' => 'Disponible',
            'maintenance_date' => now()->subDays(30), // Último mantenimiento hace 30 días
        ]);

        \App\Models\Vehicle::create([
            'type' => 'Furgoneta',
            'capacity' => 1500, // Capacidad en kg
            'status' => 'En ruta',
            'maintenance_date' => now()->subDays(15), // Último mantenimiento hace 15 días
        ]);

        \App\Models\Vehicle::create([
            'type' => 'Camioneta',
            'capacity' => 5000, // Capacidad en kg
            'status' => 'Disponible',
            'maintenance_date' => now()->subDays(60), // Último mantenimiento hace 60 días
        ]);
    }
}