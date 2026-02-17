<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("crono", fn()=> Inertia::render('Cronometro'))->name('crono');

Route::get('/', MainController::class)->name('main');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Añade todas las rutas de exercise
Route::resource("exercises", ExerciseController::class);

Route::get("entrenador", [UserController::class, "getEntrenador"])->name("entrenador.index");
Route::get("usuario", [UserController::class, "getUsuario"])->name("usuario.index");

require __DIR__.'/auth.php';
