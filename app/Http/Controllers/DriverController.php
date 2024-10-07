<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Route;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('user')->get(); // Cargar la relación con el usuario
        return view('admin.drivers-index', compact('drivers'));
    }

    public function indexDriver()
    {
        return view('conductor.dashboard');
    }

    public function create(){

        return view('admin.drivers-create');
    }
 
        public function registerDriver(Request $request)
    {
        // Validaciones
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'document' => 'required|string|min:10|unique:users,document', 
            //'role_id' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'document' => $request->document, 
        ]);

        // Asignar rol al usuario
        $user->roles()->attach(3);

        // Crear el conductor asociado al usuario
        $driver = new Driver();
        $driver->user_id = $user->id; // Asegúrate de tener esta relación definida
        $driver->license = $request->license;
        $driver->experience = $request->experience;
        

        if ($request->hasFile('imagen')) {
            
            $imagePath = $request->file('imagen')->store('images', 'public');
            $driver->imagen = $imagePath;
        }

        $driver->save();

        return redirect()->route('admin.drivers')->with('success', 'Conductor registrado con éxito');
    }

    public function assignRoutesToDriver(Request $request, $driverId)
   {
    // Validaciones
    $validator = Validator::make($request->all(), [
        'routes' => 'required|array', // Asegúrate de que routes sea un array
        'routes.*' => 'exists:routes,id', // Validar cada ruta existente
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Obtener el conductor por ID
    $driver = Driver::findOrFail($driverId);

    // Asignar rutas al conductor
    if ($request->has('routes')) {
        $driver->routes()->attach($request->routes); // Guardar relación en tabla pivote
    }

      return redirect()->route('drivers.index')->with('success', 'Rutas asignadas con éxito al conductor.');
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