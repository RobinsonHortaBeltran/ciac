<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\getApiController;
use App\Http\Controllers\UserManagementController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user-management.prueba', [UserManagementController::class, 'getUser'])->name('user-management.prueba');
Route::post('user.inactive', [UserManagementController::class, 'inactiveUser'])->name('user.inactive');
Route::post('get.rol', [UserManagementController::class, 'getRol'])->name('get.rol');

