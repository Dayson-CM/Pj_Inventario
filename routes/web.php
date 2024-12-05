<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;

// Ruta para la página principal que redirige al menú principal después de iniciar sesión
Route::middleware(['auth'])->get('/menu', function () {
    return view('menu.index'); // Carga 'resources/views/menu/index.blade.php'
})->name('menu');

// Redirige a '/menu' cuando el usuario accede a la raíz '/'
Route::get('/', function () {
    return redirect()->route('menu');
});

// Ruta para mostrar la lista de usuarios desde la base de datos
Route::middleware(['auth', 'role:admin'])->get('/users/usuarios', [UserController::class, 'index'])->name('users.usuarios');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// Ruta para la funcionalidad de "Descargar Excel" temporal**
Route::middleware(['auth'])->get('/inventory/download-excel', function () {
    return redirect()->back()->with('message', 'Funcionalidad de descargar Excel aún no está disponible.');
})->name('downloadExcel');

// Rutas para el administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class); // CRUD de usuarios
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
});

// Rutas comunes para usuario y administrador
Route::middleware(['auth'])->group(function () {
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
    Route::delete('/inventory/{id}', [InventoryController::class, 'deleteWithDetails'])->name('inventory.deleteWithDetails');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');
    Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');


});

// Ruta de autenticación
require __DIR__.'/auth.php';
