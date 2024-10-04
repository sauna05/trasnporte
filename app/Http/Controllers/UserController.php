<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Vista del panel de administración
        return view('admin.dashboard');
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function  loginForm(){
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function register(Request $request)
    // {
    //     // Validar los datos de entrada
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'document' => 'required|string|min:10|unique:users,document', 
    //         'role_id' => 'required|exists:roles,id', 
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    
    //     // Usar una transacción para asegurar la integridad
    //     DB::transaction(function () use ($request) {
    //         // Crear un nuevo usuario
    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //             'document' => $request->document, 
    //         ]);
    
    //         // Asignar rol al usuario
    //         $user->roles()->attach($request->role_id);
    //     });
    
    //     return redirect()->route('login')->with('success', 'Usuario registrado con éxito. Puedes iniciar sesión.');
    // }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        // Mostrar el formulario de inicio de sesión
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validar las credenciales de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ],[
            'password'=>'La contraseña debe ser almenos de 8 caracteres.',
        ]
    );

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirigir según el rol del usuario
            if ($user->roles()->where('name', 'admin')->exists()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->roles()->where('name', 'cliente')->exists()) {
                return redirect()->route('cliente.dashboard');
            } elseif ($user->roles()->where('name', 'conductor')->exists()) {
                return redirect()->route('conductor.dashboard');
            }

            return redirect()->route('home'); 
        }

        return redirect()->back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect()->route('loginForm');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        // Validar los datos para la actualización
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            // Agrega otros campos que deseas actualizar si es necesario
        ]);

        // Actualizar los datos del usuario
        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }
        
        // Eliminar el usuario
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito');
    }

    /**
     * Display all users.
     */
    public function allUsers()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'No hay usuarios registrados']);
        }

        return view('users.index', ['users' => $users]);
    }
}