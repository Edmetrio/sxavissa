<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
  
    public function index()
    {
        return Pagamento::orderBy('id', 'desc')->get();
    }

    public function store(Request $request, Pagamento $pagamento)
    {
        $pagamento->create($request->all());
        if($pagamento)
        {
            return ["resultado"=>"pagamento criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show(Pagamento $pagamento)
    {
        return $pagamento;
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        $pagamento->update($request->all());
        if($pagamento)
        {
            return ["resultado"=>"pagamento alterado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao alterar"];
        }
    }

    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();
        if($pagamento)
        {
            return ["resultado"=>"pagamento eliminado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Eliminar"];
        }
    }
}
