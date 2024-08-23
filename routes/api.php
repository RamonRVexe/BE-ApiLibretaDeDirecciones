<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ContactosController;
use App\Http\Controllers\Api\DireccionesController;
use App\Http\Controllers\Api\EmailsController;

# Rutas de la API de contactos
Route::prefix('contactos')->group(function () {
    Route::get('getAllContactos', [ContactosController::class, 'index']);
    Route::get('getContacto/{id}', [ContactosController::class, 'show']);
    Route::post('createContacto', [ContactosController::class, 'store']);
    Route::put('updateContacto/{id}', [ContactosController::class, 'update']);
    Route::delete('deleteContacto/{id}', [ContactosController::class, 'destroy']);
});

# Rutas para la API de direcciones

Route::prefix('direcciones')->group(function () {
    Route::get('getAllDirecciones', [DireccionesController::class, 'index']);
    Route::get('getDireccion/{id}', [DireccionesController::class, 'show']);
    Route::post('createDireccion', [DireccionesController::class, 'store']);
    Route::put('updateDireccion/{id}', [DireccionesController::class, 'update']);
    Route::delete('deleteDireccion/{id}', [DireccionesController::class, 'destroy']);
});

# Rutas para la API de email

Route::prefix('email')->group(function () {
    Route::get('getAllEmail', [EmailsController::class, 'index']);
    Route::post('{contactoId}/createEmail', [EmailsController::class, 'store']);
    Route::get('{contactoId}/getEmail}', [EmailsController::class, 'show']);
    Route::put('{contactoId}/updateEmail/{emailId}', [EmailsController::class, 'update']);
    Route::delete('{contactoId}/deleteEmail/{emailId}', [EmailsController::class, 'destroy']);
});

