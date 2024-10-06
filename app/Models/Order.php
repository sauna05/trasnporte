<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'charge', 'route_id', 'date'];

    // Relación de muchos a muchos con entregas
    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_order');
    }

    // Relación con el cliente
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relación con la ruta
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}