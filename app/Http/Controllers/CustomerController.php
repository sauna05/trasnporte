<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController; // Asegúrate de importar el UserController

class CustomerController extends Controller
{
    /**
     * Register a new customer.
     */

     public function index(){
        return view('cliente.dashboard');
     }

     
    public function indexCustomer(){
        $customers = Customer::with('user')->get();
        return view('admin.customers-index',compact('customers'));
    }

    public function createForm(){
        
        return view('admin.cliente_form');
    }
     
    public function registerCustomer(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
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
       
    
        //$user->roles()->attach($request->role_id);

        // Asignar rol al usuario
         $user->roles()->attach(2);
   


        // Crear el cliente asociado al usuario
        Customer::create([
            "user_id" => $user->id,  // Aquí obtenemos el el id del usuario recien creadi
            'phone_number' => $request->phone_number,
        ]);


    
        return redirect()->route('admin.vehicles')->with('success', 'Cliente registrado con éxito.');
    }
    /**
     * Display a listing of the customers.
    */
    // public function index()
    // {
    //     $customers = Customer::all();
    //     return view('customers.index', ['customers' => $customers]);
    // }
}
