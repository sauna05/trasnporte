<?php
// database/seeders/RouteSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Agregar registros de prueba
        Route::create([
            'origin' => 'Ciudad A',
            'destination' => 'Ciudad B',
            'distance' => 150, // Distancia en kilómetros
            'status' => 'activa',
        ]);

        Route::create([
            'origin' => 'Ciudad C',
            'destination' => 'Ciudad D',
            'distance' => 200,
            'status' => 'activa',
        ]);

        Route::create([
            'origin' => 'Ciudad E',
            'destination' => 'Ciudad F',
            'distance' => 300,
            'status' => 'inactiva',
        ]);

        Route::create([
            'origin' => 'Ciudad G',
            'destination' => 'Ciudad H',
            'distance' => 120,
            'status' => 'activa',
        ]);
    }
}