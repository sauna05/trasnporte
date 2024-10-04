<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id','imagen','license', 'experience', 'availability'];


    //relacion de muchos a muchos entre conductores y rutas
    public function routes()
    {
        return $this->belongsToMany(Route::class, 'driver_route');
    }

    
    
}
