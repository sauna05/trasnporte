<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class vehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     */
    public function index()
    {
        $vehicles = Vehicle::all(); // Obtiene todos los vehículos
        return view('vehicles.index', ['vehicles' => $vehicles]); // Asegúrate de tener la vista
    }

    /**
     * Show the form for creating a new vehicle.
     */
    public function create()
    {
        return view('vehicles.create'); // Vista para crear un nuevo vehículo
    }

    /**
     * Store a newly created vehicle in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:vehicles',
            // Agrega más validaciones según sea necesario
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vehicle = Vehicle::create($request->all());
        
        return redirect()->route('vehicles.index')->with('success', 'Vehículo registrado con éxito');
    }

    /**
     * Display the specified vehicle.
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id); // Encuentra el vehículo por ID
        return view('vehicles.show', ['vehicle' => $vehicle]); // Vista para mostrar el vehículo
    }

    /**
     * Show the form for editing the specified vehicle.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id); // Encuentra el vehículo por ID
        return view('vehicles.edit', ['vehicle' => $vehicle]); // Vista para editar el vehículo
    }

    /**
     * Update the specified vehicle in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:vehicles,license_plate,' . $id, // Excluye el actual
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado con éxito');
    }

    /**
     * Remove the specified vehicle from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado con éxito');
    }
}
