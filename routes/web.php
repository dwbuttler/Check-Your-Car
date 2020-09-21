<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\Authenticate;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/', function () { return view('login'); });
Route::post('login', [LoginController::class, 'authenticate'])->name('login');

// Register
Route::get('user/register', function() { return view('register'); })->name('user.register');
Route::post('user/create', [RegisterController::class, 'register'])->name('user.create');

Route::middleware([Authenticate::class])->group(function () {
    // Home
    Route::get('home/{id}', function ($id) { return view('home', ['user' => User::find($id)]); })->name('user.home');
    // Vehicle
    Route::get('vehicle/register', function () { return view('vehicle-register'); })->name('vehicle.register');
    Route::post('vehicle/create', [VehicleController::class, 'register'])->name('vehicle.create');
    Route::get('vehicle/edit/{id}', [VehicleController::class, 'edit']);
    Route::put('vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::delete('vehicle/delete/{id}', [VehicleController::class, 'delete']);
});
