<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Eventos\EventosList;
use App\Livewire\Eventos\EventosCreate;
use App\Livewire\Eventos\EventosEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/eventos', [EventosController::class,'create'])->name('eventos.create');
// Route::get('/eventos', EventosCreate::class)->name('eventos.create');
// Route::get('/user/create',CreateUser::class);


Route::prefix('eventos')->group(function () {
    // Listar eventos (Blade)
    // Route::get('/', [EventosController::class, 'index'])->name('eventos.index');

    // Criar evento (Livewire)
    Route::get('/criar', EventosCreate::class)->name('eventos.create');
    Route::get('/', EventosList::class)->name('eventos.index');
    Route::get('/editar/{id}', EventosEdit::class)->name('eventos.edit');

    // Exibir evento específico (Blade)
    Route::get('/{id}', [EventosController::class, 'show'])->name('eventos.show');

    // Atualizar evento (Blade)
    // Route::get('/editar/{id}', [EventosController::class, 'edit'])->name('eventos.edit');
    Route::put('/{id}', [EventosController::class, 'update'])->name('eventos.update');

    // Excluir evento
    Route::delete('/{id}', [EventosController::class, 'destroy'])->name('eventos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
