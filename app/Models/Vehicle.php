<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'capacity', 'status', 'imagen']; 

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    // Relación de muchos a muchos con rutas
    public function routes()
    {
        return $this->belongsToMany(Route::class, 'driver_route');
    }
}
