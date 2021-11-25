<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return transacao::with(['users','pagamentos','tipotransacaos'])->orderBy('id','desc')->get();
    }

    public function store(Request $request, transacao $transacao)
    {
        $transacao->create($request->all());
        if($transacao)
        { 
            return ["resultado"=>"Transação adicionada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return transacao::where(['id' => $id])->with(['users','pagamentos','tipotransacaos'])->get();
    }

    public function update(Request $request, transacao $transacao)
    {
        $transacao->update($request->all());
        if($transacao)
        {
            return ["resultado"=>"Transação actualizada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao actualizar"];
        }
    }

    public function destroy(transacao $transacao)
    {
        $transacao->delete();
        if($transacao)
        {
            return ["resultado"=>"Transação apagada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao apagar"];
        }
    }
}
