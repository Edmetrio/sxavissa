<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Endereco::with(['perfils'])->latest()->get(); 
    }

    public function store(Request $request)
    {
        $endereco = Endereco::create($request->all());
        if($endereco){
            return ["resultado"=>"Endereço criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return Endereco::where(['id' => $id])->with(['perfils'])->get();
    }

    public function update(Request $request, Endereco $endereco)
    {
        $endereco->update($request->all());
        if($endereco){
            return ["resultado"=>"Endereço Actualizado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        $endereco->delete();
        if($endereco)
        {
            return ["resultado"=>"Endereco deletado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }
    }
}
