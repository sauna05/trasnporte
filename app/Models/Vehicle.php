<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'capacity', 'status','imagem'];

    
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

   
}
