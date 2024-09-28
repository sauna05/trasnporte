<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('user')->get(); // Cargar la relación con el usuario
        return view('drivers.index', ['drivers' => $drivers]);
    }

    public function indexDriver()
    {
        return view('conductor.dashboard');
    }

    public function create()
    {
        $routes = Route::all(); // Obtener todas las rutas para la selección
        return view('drivers.create', compact('routes')); // Pasar rutas a la vista
    }

    public function registerDriver(Request $request)
    {
        //validaciones
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'availability' => 'required|boolean',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:roles,id',
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
        $driver->experience = $request->experience; // Corrige typo aquí
        $driver->availability = $request->availability;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('images', 'public');
            $driver->imagen = $imagePath;
        }

        $driver->save();

        // Asignar rutas al conductor, si se seleccionan
        if ($request->has('routes')) {
            $driver->routes()->attach($request->routes); // Guardar relación en tabla pivote
        }

        return redirect()->route('drivers.index')->with('success', 'Conductor registrado con éxito');
    }

    public function show($id)
    {
        $driver = Driver::with('user')->findOrFail($id);
        return view('drivers.show', ['driver' => $driver]);
    }

    public function edit($id)
    {
        $driver = Driver::with('user')->findOrFail($id);
        $routes = Route::all(); // Obtener todas las rutas para la selección
        $assignedRoutes = $driver->routes()->pluck('id')->toArray(); // Obtener rutas asignadas
        return view('drivers.edit', compact('driver', 'routes', 'assignedRoutes')); // Pasar rutas y conductor a la vista
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'availability' => 'required|boolean',
            // Validaciones adicionales según sea necesario
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $driver = Driver::findOrFail($id);
        
        // Actualizar los datos del conductor
        $driver->update($request->only(['license', 'experience', 'availability']));

        // Sincronizar rutas asignadas al conductor
        if ($request->has('routes')) {
            $driver->routes()->sync($request->routes); // Sincronizar relaciones en tabla pivote
        } else {
            $driver->routes()->detach(); // Desasignar todas las rutas si no se seleccionan nuevas
        }

        return redirect()->route('drivers.index')->with('success', 'Conductor actualizado con éxito');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        
       // Desasignar rutas antes de eliminar el conductor
       $driver->routes()->detach();
       $driver->delete();

       return redirect()->route('drivers.index')->with('success', 'Conductor eliminado con éxito');
   }
}