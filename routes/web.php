<?php

use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\ArmazemController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\InvoideController;
use App\Http\Controllers\ItemtransacaoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\TransacaoController;
use App\Http\Livewire\Artigos;
use App\Http\Livewire\Categoria;
use App\Http\Livewire\Relatorios;
use App\Http\Livewire\Vendas;
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
    Route::resource('itemtransacao', ItemtransacaoController::class);
    Route::resource('invoice', InvoideController::class);
    Route::resource('transacao', TransacaoController::class);
    Route::resource('historico', HistoricoController::class);
    Route::resource('relatorio', RelatorioController::class);

    Route::get('artigos', Artigos::class);
    Route::get('vendas', Vendas::class);
    Route::get('relatorios', Relatorios::class);
});

Route::resource('home', HomeController::class);

Route::get('lcategoria', Categoria::class);


require __DIR__.'/auth.php';
