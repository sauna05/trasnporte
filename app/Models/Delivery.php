<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'delivery_date'];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'delivery_order');
    }
  
}
