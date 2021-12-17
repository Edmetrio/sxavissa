<?php

use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\ArmazemController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Livewire\Categoria;
use App\Models\Models\Stock;
use Illuminate\Support\Facades\Route;

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




Route::get('/dashboard', function () {
    return view('inicio');
})->middleware(['auth'])->name('dashboard');

Route::resource('/', InicioController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('categoria', CategoriaController::class);
    Route::resource('subcategoria', SubcategoriaController::class);
    Route::resource('artigo', ArtigoController::class);
    Route::resource('stock', StockController::class);
    Route::resource('perfil', PerfilController::class);
    Route::resource('armazem', ArmazemController::class);
    Route::resource('endereco', EnderecoController::class);
    Route::resource('telefone', TelefoneController::class);
});

Route::resource('home', HomeController::class);

Route::get('lcategoria', Categoria::class);


require __DIR__.'/auth.php';
