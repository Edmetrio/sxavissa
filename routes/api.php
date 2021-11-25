<?php

use App\Http\Controllers\api\ArmazemController;
use App\Http\Controllers\api\ArtigoController;
use App\Http\Controllers\api\AumentoController;
use App\Http\Controllers\api\CategoriaController;
use App\Http\Controllers\api\ComposicaoController;
use App\Http\Controllers\api\EnderecoController;
use App\Http\Controllers\api\HistoricoController;
use App\Http\Controllers\api\ItemhistoricoController;
use App\Http\Controllers\api\ItemtransacaoController;
use App\Http\Controllers\api\NivelController;
use App\Http\Controllers\api\OperadoraController;
use App\Http\Controllers\api\PagamentoController;
use App\Http\Controllers\Api\PerfilController;
use App\Http\Controllers\api\StockController;
use App\Http\Controllers\api\SubcategoriaController;
use App\Http\Controllers\api\TelefoneController;
use App\Http\Controllers\api\TipoController;
use App\Http\Controllers\api\TipotransacaoController;
use App\Http\Controllers\api\TransacaoController;
use App\Http\Controllers\api\UnidadeController;
use App\Models\Models\Artigo;
use App\Models\Models\Endereco;
use App\Models\Models\Itemhistorico;
use App\Models\Models\Itemtransacao;
use App\Models\Models\Telefone;
use App\Models\Models\Tipotransacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('perfil', PerfilController::class);

Route::apiResource('nivel', NivelController::class);

Route::apiResource('telefone', TelefoneController::class);

Route::apiResource('operadora', OperadoraController::class);

Route::apiResource('endereco', EnderecoController::class);

Route::apiResource('categoria', CategoriaController::class);

Route::apiResource('subcategoria', SubcategoriaController::class);

Route::apiResource('tipo', TipoController::class);

Route::apiResource('unidade', UnidadeController::class);

Route::apiResource('armazem', ArmazemController::class);

Route::apiResource('stock', StockController::class);

Route::apiResource('artigo', ArtigoController::class);

Route::apiResource('composicao', ComposicaoController::class);

Route::apiResource('stock', StockController::class);

Route::apiResource('pagamento', PagamentoController::class);

Route::apiResource('tipotransacao', TipotransacaoController::class);

Route::apiResource('transacao', TransacaoController::class);

Route::apiResource('itemtransacao', ItemtransacaoController::class);

Route::apiResource('aumento', AumentoController::class);

Route::apiResource('historico', HistoricoController::class);

Route::apiResource('itemhistorico', ItemhistoricoController::class);