<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id','imagen','license', 'experience', 'availability'];


    public function routes()
    {
        return $this->belongsToMany(Route::class, 'driver_route');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    
}
