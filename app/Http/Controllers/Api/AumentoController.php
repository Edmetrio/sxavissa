<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\aumento;
use Illuminate\Http\Request;

class AumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return aumento::with(['artigos','unidades','transacaos'])->get();
    }

    public function store(Request $request, aumento $aumento)
    {
        $aumento->create($request->all());
        if($aumento)
        { 
            return ["resultado"=>"entrada de estoque adicionada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return aumento::where(['id' => $id])->with(['artigos','unidades','transacaos'])->get();
    }

    public function update(Request $request, aumento $aumento)
    {
        $aumento->update($request->all());
        if($aumento)
        { 
            return ["resultado"=>"entrada de estoque adicionada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao actualizar"];
        }
    }


    public function destroy(aumento $aumento)
    {
        $aumento->delete();
        if($aumento)
        { 
            return ["resultado"=>"entrada de estoque excluida com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Excluir"];
        }
    }
}
