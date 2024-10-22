<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\DriverRoute;
use Illuminate\Http\Request;
use App\Jobs\UpdateRouteStatus;

class driverRouteController extends Controller
{

    public function iniciarRuta(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'route_id' => 'required|exists:routes,id'
        ]);
    
        // Crear una nueva relación en la tabla driver_route
        DriverRoute::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'route_id' => $request->route_id,
        ]);
    
        // Actualizar el estado de la ruta a "en curso"
        Route::where('id', $request->route_id)->update(['status' => 'en curso']);
        Driver::where('id', $request->driver_id)->update(['availability' => 'ocupado']);
        Vehicle::where('id', $request->vehicle_id)->update(['status' => 'ocupado']);
    
        // Despachar el job para actualizar el estado a "entregada" después de 3 minutos
        UpdateRouteStatus::dispatch($request->route_id,$request->driver_id,$request->vehicle_id)->delay(now()->addMinutes(1));
    
        return redirect()->route('admin.routesForm')->with('message', 'Ruta iniciada con éxito.');
    }
    //metodo para mostrar las rutas asignadas al driver


    public function driver_route_asig($id) {
        // Obtener el conductor junto con sus rutas asignadas
        $driver = Driver::with(['user', 'driverRoutes.route'])
            ->findOrFail($id);
    
        // Verificar si el conductor tiene rutas asignadas
        if ($driver->driverRoutes->isEmpty()) {
            return view('admin.route-asignada-driver', [
                'message' => 'No hay rutas asignadas para este conductor.',
                'driver' => $driver,
                'hasRoutes' => false 
            ]);
        }
    
        // Pasar los datos a la vista
        return view('admin.route-asignada-driver', [
            'driver' => $driver,
            'hasRoutes' => true // Indicador de que hay rutas
        ]);
    }

    
}
