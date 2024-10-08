<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generar un nombre de archivo de imagen aleatorio
        $imageName = $this->faker->unique()->word . '.jpg';

        return [
            'type' => $this->faker->randomElement(['Camión', 'Furgoneta', 'Camioneta', 'SUV', 'Motocicleta']),
            'capacity' => $this->faker->numberBetween(200, 10000), // Capacidad entre 200 y 10000 kg
            // Ruta simulada para la imagen almacenada
            'imagen' => 'images/' . $imageName, // Ruta relativa a storage/app/public
        ];
    }
}