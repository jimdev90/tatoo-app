<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\MiCitaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TatuadorController;
use App\Models\Cita;
use App\Models\Tatuador;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/mis-citas', function () {
    $tatuadores = Tatuador::where('estado', 'ACTIVO')->get();
    $misCitas = Cita::where('id_user', auth()->user()->id)
        ->where('estado', 'ACTIVO')
        ->with(['tatuador', 'user'])
        ->orderBy('id', 'desc')
        ->get();
    return Inertia::render('Dashboard', [
        'tatuadores' => $tatuadores,
        'mis_citas' => $misCitas
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/mis-citas', [MiCitaController::class, 'store'])->name('mi-cita.store');
    Route::put('/mis-citas/update', [MiCitaController::class, 'update'])->name('mi-cita.update');
    Route::delete('/mis-citas/delete', [MiCitaController::class, 'delete'])->name('mi-cita.delete');
});

Route::middleware(['auth', 'verified', 'role:ADMIN'])->group(function (){

    Route::get("/tatuador", [TatuadorController::class, 'index'])->name('tatuador.index');
    Route::post("/tatuador", [TatuadorController::class, 'store'])->name('tatuador.store');
    Route::put("/tatuador/update", [TatuadorController::class, 'update'])->name('tatuador.update');
    Route::delete("/tatuador/delete", [TatuadorController::class, 'delete'])->name('tatuador.delete');


    Route::get("/citas", [CitaController::class, 'index'])->name('cita.index');

});

require __DIR__.'/auth.php';
