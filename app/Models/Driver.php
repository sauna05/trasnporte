<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'imagen', 'license_id', 'experience', 'availability'];

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'driver_route');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cambiar esta relación
    public function licence()
    {
        return $this->belongsTo(Licence::class, 'license_id'); // Cambia belongsToMany a belongsTo
    }
}