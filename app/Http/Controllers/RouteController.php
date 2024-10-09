<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Vehicle;

class RouteController extends Controller
{
   
    public function route_customer() {
        // Obtener el usuario autenticado
        $id_user = Auth::id(); 
    
        // Buscar el cliente asociado al usuario autenticado
        $customer = Customer::with(['orders.route', 'user:id,name,document'])
            ->where('user_id', $id_user) // Traer el user_id la relación entre customer y user
            ->first(); 
    
        // // Si no se encuentra un cliente, redirigir o mostrar un mensaje
        // if (!$customer || $customer->orders->isEmpty()) {
        //     return redirect()->back()->with('alert', 'No tienes rutas o pedidos creados.');
        // }
    
        return view('cliente.routes-show', compact('customer'));
    }

    public function route_show($id)
    {
        $customer = Customer::with(['orders.route', 'user:id,name,document'])
            ->has('orders')
            ->findOrFail($id);

        $drivers = Driver::with('user')->get();
        $vehicles = Vehicle::all();
    
        return view('admin.routes-show', compact('customer', 'drivers', 'vehicles'));

    }

    // public function route_show_driver(){
    //     $driver=Driver::with();
    //     return view('coductor.');
    // }
    

    public function routes_index()
    {
        
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
    
        // Obtener clientes con sus órdenes y rutas asociadas, filtrando por documento si se proporciona
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