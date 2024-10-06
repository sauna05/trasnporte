<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Route;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Función para mostrar el formulario de creación de pedidos
    public function create()
    {
        return view('cliente.orders-create'); 
    }

    // Función para registrar la ruta y el pedido
    public function store(Request $request)
    {
        // Validar los datos del pedido
        $request->validate([
            'charge' => 'required|string',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'distance' => 'required|numeric',
            'date' => 'required|date',
        ]);
    
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();
    
        // Verificar si el cliente existe para este usuario
        $customer = Customer::where('user_id', $userId)->first();
    
        if (!$customer) {
            return redirect()->back()->withErrors(['customer' => 'No se encontró un cliente asociado a tu cuenta.']);
        }
    
        // Crear la ruta
        $route = Route::create([
            'origin' => $request->origin,
            'destination' => $request->destination,
            'distance' => $request->distance,
            'status' => 'pendiente', // Estado inicial
        ]);
    
        // Crear el pedido asociado a la ruta
        Order::create([
            'customer_id' => $customer->id, 
            'charge' => $request->charge,
            'route_id' => $route->id, 
            'date' => $request->date,
        ]);
    
        // Redirigir a una vista con un mensaje de éxito
        return redirect()->route('cliente.dashboard')->with('message', 'Pedido creado con éxito.');
    }
}
