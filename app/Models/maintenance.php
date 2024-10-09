<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id','maintenance_date','description'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
