<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController; // Importa el UserController

class DriverController extends Controller
{
    /**
     * Display a listing of the drivers.
     */
    public function index()
    {
        $drivers = Driver::with('user')->get(); // Cargar la relación con el usuario
        return view('drivers.index', ['drivers' => $drivers]); // Asegúrate de tener la vista
    }

    public function indexdriver(){
        return view('conductor.dashboard');
    }


    /**
     * Show the form for creating a new driver.
     */
    public function create()
    {
        return view('drivers.create'); // Vista para crear conductor
    }

    /**
     * Store a newly created driver in storage.
     */
    public function registerDriver(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'availability' => 'required|boolean',
            // Agrega validaciones para el usuario
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:roles,id', // Asegúrate de que el rol sea válido
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Registrar el usuario utilizando el UserController
        $userController = new UserController();
        $userResponse = $userController->register($request);

        if ($userResponse->getStatusCode() !== 201) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el usuario.']);
        }

        // Obtener el usuario creado
        $user = json_decode($userResponse->getContent());

        if (!isset($user->user)) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el usuario.']);
        }
        
        // Crear el conductor asociado al usuario

        $driver = new Driver();
        $driver->imagen = $request->imagen;
        $driver->license = $request->license;
        $driver->experience = $request->exeperience;
        $driver->availability = $request->availability;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('images', 'public');
            $driver->imagen = $imagePath;
        }

        $driver->save();
        
        return redirect()->route('drivers.index')->with('success', 'Conductor registrado con éxito');
    }

    /**
     * Display the specified driver.
     */
    public function show($id)
    {
        $driver = Driver::with('user')->findOrFail($id); // Cargar el conductor y su usuario
        return view('drivers.show', ['driver' => $driver]); // Asegúrate de tener la vista
    }

    /**
     * Show the form for editing the specified driver.
     */
    public function edit($id)
    {
        $driver = Driver::with('user')->findOrFail($id);
        return view('drivers.edit', ['driver' => $driver]); // Asegúrate de tener la vista
    }

    /**
     * Update the specified driver in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'availability' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $driver = Driver::findOrFail($id);
        $driver->update($request->only(['license', 'experience', 'availability']));

        return redirect()->route('drivers.index')->with('success', 'Conductor actualizado con éxito');
    }

    /**
     * Remove the specified driver from storage.
     */
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Conductor eliminado con éxito');
    }
}


