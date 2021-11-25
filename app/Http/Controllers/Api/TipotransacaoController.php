<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Tipotransacao;
use Illuminate\Http\Request;

class TipotransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tipotransacao::orderBy('id', 'desc')->get();
    }

    public function store(Request $request, Tipotransacao $tipotransacao)
    {
        $tipotransacao->create($request->all());
        if($tipotransacao){
            return ["resultado"=>"Tipo de transação adicionado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show(Tipotransacao $tipotransacao)
    {
        return $tipotransacao;
    }

    public function update(Request $request, Tipotransacao $tipotransacao)
    {
        $tipotransacao->update($request->all());
        if($tipotransacao){
            return ["resultado"=>"Tipo de transação criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    public function destroy(Tipotransacao $tipotransacao)
    {
        $tipotransacao->delete();
        if($tipotransacao){
            return ["resultado"=>"Tipo de transação elimido com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Eliminar"];
        }
    }
}
