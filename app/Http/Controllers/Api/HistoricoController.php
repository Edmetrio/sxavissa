<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Historico;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
   

    public function index()
    {
        return Historico::with(['users','pagamentos','tipotransacaos'])->orderBy('id', 'desc')->get();
    }

    public function store(Request $request, Historico $historico)
    {
        $historico->create($request->all());
        if($historico)
        { 
            return ["resultado"=>"Historico adicionado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return Historico::where(['id' => $id])->with(['users','pagamentos','tipotransacaos'])->get();
    }

    public function update(Request $request, Historico $historico)
    {
        $historico->update($request->all());
        if($historico)
        {
            return ["resultado"=>"Histórico actualizado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao actualizar"];
        }
    }

    public function destroy(Historico $historico)
    {
       $historico->delete();
       if($historico)
       {
        return ["resultado"=>"Histórico Eliminado com sucesso"];
    } else {
        return ["resultado"=>"Erro ao Eliminar"];
    }
    }
}
