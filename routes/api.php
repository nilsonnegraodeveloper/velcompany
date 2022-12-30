<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoSalaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\TipagemSalaController;

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

Route::prefix('v1')->group(function () {
    //Authenticate
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('v1')->middleware('jwt.auth')->group(function () {
    
    //Auth
    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Users    
    Route::post('users/signup', [UserController::class, 'signup']);

    //Clientes
    Route::get('clientes', [ClienteController::class, 'index']);
    Route::get('clientes/{id}', [ClienteController::class, 'show']);
    Route::post('clientes/store', [ClienteController::class, 'store']);
    Route::put('clientes/update/{id}', [ClienteController::class, 'update']);
    Route::delete('clientes/delete/{id}', [ClienteController::class, 'delete']);

    //Prédios
    Route::get('predios', [PredioController::class, 'index']);
    Route::get('predios/{id}', [PredioController::class, 'show']);
    Route::post('predios/store', [PredioController::class, 'store']);
    Route::put('predios/update/{id}', [PredioController::class, 'update']);
    Route::delete('predios/delete/{id}', [PredioController::class, 'delete']);

    //Salas
    Route::get('salas', [SalaController::class, 'index']);
    Route::get('salas/{id}', [SalaController::class, 'show']);
    Route::post('salas/store', [SalaController::class, 'store']);
    Route::put('salas/update/{id}', [SalaController::class, 'update']);
    Route::delete('salas/delete/{id}', [SalaController::class, 'delete']);

    //Tipos de Salas
    Route::get('tiposSalas', [TipoSalaController::class, 'index']);
    Route::get('tiposSalas/{id}', [TipoSalaController::class, 'show']);
    Route::post('tiposSalas/store', [TipoSalaController::class, 'store']);
    Route::put('tiposSalas/update/{id}', [TipoSalaController::class, 'update']);
    Route::delete('tiposSalas/delete/{id}', [TipoSalaController::class, 'delete']);

    //Tipagem de Salas
    Route::get('tipagemSalas', [TipagemSalaController::class, 'index']);
    Route::get('tipagemSalas/{id}', [TipagemSalaController::class, 'show']);
    Route::post('tipagemSalas/store', [TipagemSalaController::class, 'store']);
    Route::put('tipagemSalas/update/{id}', [TipagemSalaController::class, 'update']);
    Route::delete('tipagemSalas/delete/{id}', [TipagemSalaController::class, 'delete']);
});
