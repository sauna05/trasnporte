<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController; // Asegúrate de importar el UserController

class CustomerController extends Controller
{
    /**
     * Register a new customer.
     */

     
    public function indexCustomer(){
        return view('cliente.dashboard');
    }

     
    public function registerCustomer(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255',
            
            'name' => 'required|string|max:255', // También valida el nombre del usuario
            'email' => 'required|string|email|max:255|unique:users', // Asegúrate de que el email sea único
            'password' => 'required|string|min:6|confirmed', // Asegúrate de manejar la contraseña
            'role_id' => 'required|exists:roles,id', // Asegúrate de que el rol sea válido
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Registrar el usuario utilizando el UserController
        $userController = new UserController();
        $userResponse = $userController->register($request);

        // Verifica si el registro fue exitoso
        if ($userResponse->getStatusCode() !== 201) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el usuario.']);
        }

        // Obtener el usuario registrado
        $user = json_decode($userResponse->getContent());

        if (!isset($user->user)) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el usuario.']);
        }

        // Crear el cliente asociado al usuario
        Customer::create([
            'user_id' => $user->user->id,
            'phone_number' => $request->phone_number,
        
        ]);

        return redirect()->route('customers.index')->with('success', 'Cliente registrado con éxito');
    }

    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }
}
