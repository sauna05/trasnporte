<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverRoute extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'driver_id', 'route_id'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'driver_routes');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class,'driver_routes');
    }

    public function route()
    {
        return $this->belongsTo(Route::class,'driver_routes');
    }
}
