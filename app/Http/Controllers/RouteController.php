<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class RouteController extends Controller
{

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
    
        // Obtener el número de documento del formulario
        $document = $request->input('document');
    
        // Obtener clientes con sus órdenes y rutas asociadas, filtrando por documento si se proporciona
        $customers = Customer::with(['orders.route', 'user:id,name,document'])
            ->when($document, function ($query) use ($document) {
                return $query->whereHas('user', function ($q) use ($document) {
                    $q->where('document', 'like', '%' . $document . '%'); // Filtrar por documento
                });
            })
            ->get();
    
        // Verificars
       
    
        return view('admin.routes-index', compact('customers'));
    }

}