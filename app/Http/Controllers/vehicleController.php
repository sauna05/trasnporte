<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class vehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all(); // Obtener todos los vehículos
        return view('admin.vehicles-index', compact('vehicles')); // Pasar datos a la vista
    }

    public function create()
    {
        return view('admin.create_vehicles');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
           
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Vehicle::create($request->all());
        return redirect()->route('admin.dashboard');
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado con éxito');

    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado con éxito');
    }
}