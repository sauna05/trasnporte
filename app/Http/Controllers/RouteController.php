<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class RouteController extends Controller
{

    public function route_show($id)
    {
        // Obtener la ruta específica por ID, junto con el cliente y su información
        $route = Route::with(['orders.customer.user:id,name,document']) // Asegúrate de que 'Route' sea el modelo correcto
            ->findOrFail($id); // Busca la ruta por ID o lanza un error 404 si no se encuentra
    
        // Puedes acceder al cliente a través de la relación
        $customer = $route->orders->first()->customer; // Asumiendo que hay al menos una orden
    
        return view('admin.routes-show', compact('route', 'customer'));
    }

    public function routes_index()
    {
        // Obtener todos los clientes que tienen al menos una orden asociada, junto con las rutas y el nombre del usuario
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