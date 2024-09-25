<?php

use App\Http\Controllers\vehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('ruta', [vehicleController::class, 'store'])
    ->middleware(\App\Http\Middleware\RoleMiddleware::class); // Usar el middleware