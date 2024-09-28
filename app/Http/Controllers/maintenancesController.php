<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class maintenancesController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::all();
        return view('maintenances.index', compact('maintenances'));
    }

    public function create()
    {
        $vehicles = Vehicle::all(); // Para seleccionar el vehículo asociado
        return view('maintenances.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required|exists:vehicles,id', // Asegúrate de que el vehículo exista
            'maintenance_date' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Maintenance::create($request->all());
        return redirect()->route('maintenances.index')->with('success', 'Mantenimiento registrado con éxito');
    }

    public function show($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        return view('maintenances.show', compact('maintenance'));
    }

    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $vehicles = Vehicle::all(); // Para seleccionar el vehículo asociado
        return view('maintenances.edit', compact('maintenance', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required|exists:vehicles,id',
            'maintenance_date' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($request->all());
        return redirect()->route('maintenances.index')->with('success', 'Mantenimiento actualizado con éxito');
    }

    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('maintenances.index')->with('success', 'Mantenimiento eliminado con éxito');
    }
}