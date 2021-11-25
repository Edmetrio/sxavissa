<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Unidade::latest()->get();
    }

    public function store(Request $request, Unidade $unidade)
    {
        $unidade->create($request->all());
        if($unidade){
            return ["resultado"=>"Unidade criada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show(Unidade $unidade)
    {
        return $unidade;
    }

    public function update(Request $request, Unidade $unidade)
    {
        $unidade->update($request->all());
        if($unidade){
            return ["resultado"=>"Unidade actualizada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        if($unidade){
            return ["resultado"=>"Unidade deletada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }
}
