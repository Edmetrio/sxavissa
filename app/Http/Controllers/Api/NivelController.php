<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return nivel::latest()->get();
    }

    public function store(Request $request)
    {
        $nivel = nivel::create($request->all());
        if($nivel){
            return ["resultado"=>"Perfil criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show(nivel $nivel)
    {
        return $nivel;
    }

    public function update(Request $request, nivel $nivel)
    {
        $nivel->update($request->all());
        if($nivel)
        {
            return ["resultado"=>"Nivel actualizado com sucesso"];
        } else 
        {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function destroy(nivel $nivel)
    {
        $nivel = $nivel->delete();
        if($nivel)
        {
            return ["resultado"=>"Nivel apagado com sucesso"];
        } else 
        {
            return ["resultado"=>"Erro a apagar"];
        }
    }
}
