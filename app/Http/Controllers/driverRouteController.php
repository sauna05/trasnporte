<?php

namespace App\Http\Controllers;

use App\Models\DriverRoute;
use Illuminate\Http\Request;

class driverRouteController extends Controller
{

    public function iniciarRuta(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'route_id'=>'required|exists:routes,id'
        ]);

        // Crear una nueva relación en la tabla driver_route
        DriverRoute::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'route_id' => $request->route_id,
        ]);

        return redirect()->route('admin.routes.show')->with('message', 'Ruta iniciada con éxito.');
    }

}
