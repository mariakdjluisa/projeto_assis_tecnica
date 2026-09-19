<?php

use Illuminate\Support\Facades\Route;

// Route::view('cliente', 'clientes.index')->name('clientes.index');
// tipo: view (só exibe, sem lógica)
// URI: 'cliente' -> aparece como /cliente na URL
// view: 'clientes.index' -> carrega resources/views/clientes/index.blade.php
// name: 'clientes.index' -> apelido interno da rota

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoServicoController;


Route::view('/', 'welcome')->name('home');
// URI parametro que eu passo após URL
Route::resource('tipo-servico', TipoServicoController::class);
Route::resource('categorias',CategoriaController::class);
Route::resource('cliente', ClientesController::class); 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    // 1° Nome da minha URI
    // 2° É o nome da minha view
    // Ele segue me ordem, então primeiro precisa estar logado para ter acesso ao dashboard
});

require __DIR__.'/settings.php';
