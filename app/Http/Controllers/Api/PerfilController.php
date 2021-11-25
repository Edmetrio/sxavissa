<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = Perfil::with(['users'])->orderBy('id', 'desc')->get();
        return $perfil;
    }


    public function store(Request $request)
    {
        $perfil = Perfil::create($request->all());
        if($perfil){
            return ["resultado"=>"Perfil criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show(Perfil $perfil)
    {
        return $perfil->with(['users'])->get();
    }

    public function update(Request $request, Perfil $perfil)
    {
        $perfil->update($request->all());
        if($perfil)
        {
            return ["resultado"=>"Perfil actualizado com sucesso"];
        } else 
        {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    public function destroy(Perfil $perfil)
    {
        $perfil->delete();
        if($perfil)
        {
            return ["resultado"=>"Perfil deletado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }
    }
}
