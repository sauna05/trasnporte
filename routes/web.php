<?php
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Ruta principal que gestione el login 
Route::get('/', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login'])->name('login');

//Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// // Rutas para el admin
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create',[vehicleController::class,'create'])->name('create_vehicle_view');
    Route::post('/admin/register', [vehicleController::class, 'store'])->name('register_vehicle');
     Route::get('/admin/vehicles', [vehicleController::class, 'index'])->name('admin.vehicles');
    // Route::post('/admin/vehicles', [vehicleController::class, 'store'])->name('admin.vehicles.store');
    // Route::get('/admin/vehicles/create', [vehicleController::class, 'create'])->name('admin.vehicles.create');
    // Route::get('/admin/vehicles/{id}', [vehicleController::class, 'show'])->name('admin.vehicles.show');
    // Route::get('/admin/vehicles/{id}/edit', [vehicleController::class, 'edit'])->name('admin.vehicles.edit');
    // Route::post('/admin/vehicles/{id}', [vehicleController::class, 'update'])->name('admin.vehicles.update');
    // Route::delete('/admin/vehicles/{id}', [vehicleController::class, 'destroy'])->name('admin.vehicles.destroy');
 });

// // Rutas para conductores
Route::middleware(['role:conductor'])->group(function () {
    Route::get('/conductor/dashboard', [DriverController::class, 'indexdriver'])->name('conductor.dashboard');
    // Otras rutas para conductores
});

// Rutas para clientes
Route::middleware(['role:cliente'])->group(function () {
    Route::get('/cliente/dashboard', [CustomerController::class, 'indexCustomer'])->name('cliente.dashboard');
    // Otras rutas para clientes
});


