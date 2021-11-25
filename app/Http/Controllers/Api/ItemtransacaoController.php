<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Itemtransacao;
use Illuminate\Http\Request;

class ItemtransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Itemtransacao::with(['transacaos','artigos'])->get();
    }

    public function store(Request $request, Itemtransacao $item)
    {
        $item->create($request->all());
        if($item)
        { 
            return ["resultado"=>"Item de Transação adicionado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return Itemtransacao::where(['id' => $id])->with(['transacaos','artigos'])->get();
    }

    public function update(Request $request, $id)
    {
        $item = Itemtransacao::where(['id' => $id])->update($request->all());
        if($item)
        { 
            return ["resultado"=>"Item actualizado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    public function destroy($id)
    {
        $item = Itemtransacao::where(['id' => $id])->delete();
        if($item)
        { 
            return ["resultado"=>"Item apagado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Apagar"];
        }
    }
}
