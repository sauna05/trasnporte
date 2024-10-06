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
    // Obtener todos los clientes con sus ordemes y las rutas asociadas  junto con el nombre del usuario
    $customers = Customer::with(['orders.route', 'user:id,name'])->get();

    // Verificars
    if ($customers->isEmpty()) {
        return view('admin.routesForm')->with('message', 'No se encontraron clientes.');
    }

    return view('admin.routesForm', compact('customers'));
}

}