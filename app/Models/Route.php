<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['origin', 'destination', 'distance', 'status'];

    // Relación de muchos a muchos con conductores y rutas
    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'driver_route');  
    }

    // Relación con los pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}