<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\CinController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cadastrar', [AtendimentoController::class, 'create']);
Route::post('/cadastrar', [AtendimentoController::class, 'store']);
Route::get('/relatorio/gerar', [AtendimentoController::class, 'gerarRelatorio'])->name('relatorio.gerar');



// Rota para processar o cadastro da CIN
Route::get('/cadastrar-cin', function () {
    return view('cadastrar'); // ou o nome da sua view para cadastrar CIN
});

Route::post('/cadastrar-cin', [AtendimentoController::class, 'storeCin']);


Route::get('/cin/busca', [CinController::class, 'index'])->name('cin.index');


require __DIR__.'/auth.php';

