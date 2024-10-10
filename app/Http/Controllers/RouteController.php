<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Route;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
   
    public function route_customer() {
        // Obtener el usuario autenticado
        $id_user = Auth::id(); 
    
        // Buscar el cliente asociado al usuario autenticado
        $customer = Customer::with(['orders.route', 'user:id,name,document'])
            ->where('user_id', $id_user) 
            ->first(); 
    
        return view('cliente.routes-show', compact('customer'));
    }

    // public function route_show($id)
    // {
    //     $customer = Customer::with(['orders.route', 'user:id,name,document'])
    //         ->has('orders')
    //         ->findOrFail($id);

    //     $drivers = Driver::with('user')->get();
    //     $vehicles = Vehicle::all();
    
    //     return view('admin.routes-show', compact('customer', 'drivers', 'vehicles'));

    // }

    public function route_show($id)
    {
        // Encontrar la orden específica 
        $order = Order::with(['route', 'customer.user:id,name,document'])
            ->where('id', $id)
            ->firstOrFail(); 
    
        $customer = $order->customer; // Obtener el cliente asociado
        $drivers = Driver::with('user')->where('availability', 'disponible')->get(); 
        $vehicles = Vehicle::where('status', 'disponible')->get(); 
    
        
        return view('admin.routes-show', compact('customer', 'order', 'drivers', 'vehicles'));
    }
    
    
    public function routes_index()
    {
        // Obtener todos los clientes con sus pedidos y rutas, sin aplicar el filtro de órdenes
        $customers = Customer::with(['orders.route', 'user:id,name,document'])
            ->has('orders') // Filtra para obtener solo clientes con órdenes
            ->get();
    
        return view('admin.routes-index', compact('customers'));
    }
    
    
    public function buscadorDocument(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'document' => 'nullable|string|max:255', 
        ]);
    
        // Obtener el número de documento del form
        $document = $request->input('document');
    
        $customers = Customer::with(['orders.route', 'user:id,name,document'])
            ->when($document, function ($query) use ($document) {
                return $query->whereHas('user', function ($q) use ($document) {
                    $q->where('document', 'like', '%' . $document . '%'); // Filtrar por documento
                });
            })
            ->has('orders') 
            ->get();
    
        // Verificar 
        $clientFound = $customers->isNotEmpty();
    
        return view('admin.routes-index', compact('customers', 'clientFound', 'document'));
    }
}