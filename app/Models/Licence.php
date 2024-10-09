<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'license_id'); // Asegúrate de especificar el campo de clave foránea
    }
}