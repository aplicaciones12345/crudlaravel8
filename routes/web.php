<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomAuthController;

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

//La ruta raíz del sitio
//La ruta cuando se llama a la vista iniciogeneral desde navbar_registration.blade.php
Route::view('/', 'iniciogeneral')->name('iniciogeneral');

//La ruta para la API o CRUD de productos
Route::resource('products', ProductController::class);

//Rutas para Logearse
Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



//backend admin
Route::view('admin', 'admin.login_admin')->name('admin');

//Ruta para el admin logeado
Route::view('ad', 'admin.dashboard_admin')->name('ad');
//Ruta para el usuario ordinario logeado
Route::view('us', 'auth.dashboard_user')->name('us');