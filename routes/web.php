<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TicketsController;


Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');


Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {




    Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');

    #Register user
    Route::post('registro',         [RegisterController::class,'store'])->name('registro.usuario');
    Route::post('actualizar',       [RegisterController::class,'update'])->name('actualizar.usuario');
    #User management
    Route::get('user-management',   [UserManagementController::class, 'index'])->name('user-management');

    #Roles
    Route::post('registro.rol',     [RolesController::class, 'store'])->name('registro.rol');
    Route::post('actualizar.rol',   [RolesController::class, 'update'])->name('actualizar.rol');
    Route::get('roles',             [RolesController::class, 'index'])->name('roles');

    #Soporte
    Route::get('soporte',             [TicketsController::class,'index'])->name('soporte');
    Route::post('registro.soporte',   [TicketsController::class,'store'])->name('registro.soporte');

    Route::get('seguimiento.soporte/{id}',[TicketsController::class,'getTikets'])->name('seguimiento.soporte');
    Route::post('registro.seguimiento',   [TicketsController::class,'storeDescription'])->name('registro.seguimiento');
    Route::get('cerrar.ticket/{id}',      [TicketsController::class,'destroy'])->name('cerrar.ticket');
    Route::get('generar.pdf/{id}',        [TicketsController::class,'showPdf'])->name('generar.pdf');
    Route::get('listar.documentos/{id}',  [TicketsController::class,'listDocuments'])->name('listar.documentos');
    Route::post('cargar.documento',       [TicketsController::class,'storeDocument'])->name('cargar.documento');

});


