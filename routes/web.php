<?php
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RouteController;
use App\Models\Driver;
use Illuminate\Support\Facades\Route;

// Ruta principal que gestione el login 
Route::get('/', function () {
    return view('admin.vehicles-index');
});

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
// //Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// // Rutas para el admin
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [VehicleController::class, 'create'])->name('create_vehicle_view');
    Route::post('/admin/register', [VehicleController::class, 'store'])->name('register_vehicle');
    Route::get('/admin/vehicles', [VehicleController::class, 'index'])->name('admin.vehicles');

    // Uncomment these routes if needed
    // Route::post('/admin/vehicles', [VehicleController::class, 'store'])->name('admin.vehicles.store');
    // Route::get('/admin/vehicles/create', [VehicleController::class, 'create'])->name('admin.vehicles.create');
    // Route::get('/admin/vehicles/{id}', [VehicleController::class, 'show'])->name('admin.vehicles.show');
    // Route::get('/admin/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('admin.vehicles.edit');
    // Route::post('/admin/vehicles/{id}', [VehicleController::class, 'update'])->name('admin.vehicles.update');
    // Route::delete('/admin/vehicles/{id}', [VehicleController::class, 'destroy'])->name('admin.vehicles.destroy');

    Route::get('/admin/cliente', [CustomerController::class, 'createForm'])->name('admin.clienteForm');
    Route::post('/admin/cliente', [CustomerController::class, 'registerCustomer'])->name('admin.registerCliente');

    Route::get('/admin/driver', [DriverController::class, 'create_driverForm'])->name('admin.createForm');
    Route::post('/admin/driver', [DriverController::class, 'registerDriver'])->name('admin.registerDriver');
    Route::post('/admin/logout', action: [UserController::class, 'logout'])->name('admin.logout');

    //rutas

    Route::get('/admin/routes',[RouteController::class,'routes_index'])->name('admin.routesForm');

});



// // Rutas para conductores
Route::middleware(['role:conductor'])->group(function () {
    Route::get('/conductor/dashboard', [DriverController::class, 'indexdriver'])->name('conductor.dashboard');
    // Otras rutas para conductores
});

// Rutas para clientes
Route::middleware(['role:cliente'])->group(function () {
    Route::get('/cliente/dashboard', [CustomerController::class, 'indexCustomer'])->name('cliente.dashboard');
    Route::get('/cliente/createOrder', [OrderController::class, 'create'])->name('cliente.orders-create');
    Route::post('/cliente/registerorder', [OrderController::class, 'store'])->name('cliente.registerOrder');
});


