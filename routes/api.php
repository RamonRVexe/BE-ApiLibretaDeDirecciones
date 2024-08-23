<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ContactosController;

# Rutas de la API de contactos
Route::prefix('contactos')->group(function () {
    Route::get('getAllContactos', [ContactosController::class, 'index']);
    Route::get('getContacto/{id}', [ContactosController::class, 'show']);
    Route::post('createContacto', [ContactosController::class, 'store']);
    Route::put('updateContacto{id}', [ContactoController::class, 'update']);
    Route::delete('delateContacto{id}', [ContactoController::class, 'destroy']);
});
