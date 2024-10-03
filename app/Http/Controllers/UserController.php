<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //vista admin
    public function index(Request $request)
    {
        return view('admin.dashboard');
    }


    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:roles,id', // Asegúrate de que el rol sea válido
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar rol al usuario
        $user->roles()->attach($request->role_id);

        return redirect()->route('login')->with('success', 'Usuario registrado con éxito. Puedes iniciar sesión.');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

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

    public function logout(Request $request)
    {
        Auth::logout(); // Esto elimina la sesión
        return redirect()->route('login')->with('success', 'Sesión cerrada con éxito.');
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

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            // Agrega otros campos que deseas actualizar
        ]);

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
        
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito');
    }

    public function allUsers()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'No hay usuarios registrados']);
        }

        return view('users.index', ['users' => $users]);
    }
}
