<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Route;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\Models\Licence;
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

        $licences = Licence::all();
        return view('admin.drivers-create',compact('licences'));
    }
 
        public function registerDriver(Request $request)
        {
        // Validaciones
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license_id' => 'required|exists:licences,id',
            'experience' => 'required|integer|min:0',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'document' => 'required|string|min:10|unique:users,document', 
        ], [
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'imagen.max' => 'La imagen no debe pesar más de 2 MB.',
            
            'license.required' => 'El campo licencia es obligatorio.',
            'license.string' => 'La licencia debe ser una cadena de texto.',
            'license.max' => 'La licencia no puede tener más de 255 caracteres.',
            
            'experience.required' => 'El campo experiencia es obligatorio.',
            'experience.integer' => 'La experiencia debe ser un número entero.',
            'experience.min' => 'La experiencia no puede ser negativa.',
            
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido tomado.',
            
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            
            'document.required' => 'El campo documento es obligatorio.',
            'document.string' => 'El documento debe ser una cadena de texto.',
            'document.min' => 'El documento debe tener al menos 10 caracteres.',
            'document.unique' => 'El documento ya ha sido registrado.'
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
        $driver->license_id = $request->license_id;
        $driver->experience = $request->experience;
        

        if ($request->hasFile('imagen')) {
            
            $imagePath = $request->file('imagen')->store('images', 'public');
            $driver->imagen = $imagePath;
        }

        $driver->save();

        return redirect()->route('admin.drivers')->with('message', 'Conductor registrado con éxito');
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
      // Obtener el conductor específico junto con su usuario
      $driver = Driver::with('user')->findOrFail($id);
      
      // Pasar el conductor a la vista
      return view('admin.driver-show', compact('driver'));
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