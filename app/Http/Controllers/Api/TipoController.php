<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tipo::orderBy('id', 'desc')->get();
    }

    public function store(Request $request, Tipo $tipo)
    {
        $tipo->create($request->all());
        if($tipo){
            return ["resultado"=>"Tipo criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        return $tipo;
    }

    public function update(Request $request, Tipo $tipo)
    {
        $tipo->update($request->all());
        if($tipo)
        {
            return ["resultado"=>"Tipo actualizado com sucesso"];
        } else 
        {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        if($tipo)
        {
            return ["resultado"=>"Tipo deletado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }

    }
}
