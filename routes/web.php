<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\User;
use Illuminate\Http\Request;
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
Route::post('login', [LoginController::class, 'login'])->name('login');

// Register
Route::get('user/register', function() { return view('register'); })->name('user.register');
Route::post('user/create', [RegisterController::class, 'register'])->name('user.create');

// Home
Route::get('home/{user}', function (User $user) { return view('home', ['user' => $user]); })->name('user.home');

// Vehicle
Route::get('vehicle/register', function () { return view('vehicle-register'); });
