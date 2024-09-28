<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Driver;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        $drivers = Driver::all(); // Obtener todos los conductores para la selección
        return view('routes.create', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'status' => 'required|string|max:255',
            'drivers' => 'array', // Validar que sea un array si se seleccionan múltiples conductores
            'drivers.*' => 'exists:drivers,id', // Validar que los IDs de los conductores existan
        ]);

        $route = Route::create($request->only(['origin', 'destination', 'distance', 'status']));

        if ($request->has('drivers')) {
            $route->drivers()->attach($request->drivers); // Asignar conductores a la ruta
        }

        return redirect()->route('routes.index')->with('success', 'Ruta agregada exitosamente');
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);
        $drivers = Driver::all(); // Obtener todos los conductores para la selección
        $assignedDrivers = $route->drivers()->pluck('id')->toArray(); // Obtener IDs de conductores asignados
        return view('routes.edit', compact('route', 'drivers', 'assignedDrivers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'status' => 'required|string|max:255',
            'drivers' => 'array',
            'drivers.*' => 'exists:drivers,id',
        ]);

        $route = Route::findOrFail($id);
        $route->update($request->only(['origin', 'destination', 'distance', 'status']));

        if ($request->has('drivers')) {
            $route->drivers()->sync($request->drivers); // Sincronizar conductores asignados
        } else {
            $route->drivers()->detach(); // Desasignar todos los conductores si no se seleccionan
        }

        return redirect()->route('routes.index')->with('success', 'Ruta actualizada con éxito');
    }

    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->drivers()->detach(); // Desasignar conductores antes de eliminar la ruta
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Ruta eliminada con éxito');
    }
}