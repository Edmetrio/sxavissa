<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefone = Telefone::with(['perfils','operadoras'])->latest()->get();
        return $telefone;
    }

    public function store(Request $request)
    {
        $telefone = Telefone::create($request->all());
        if($telefone){
            return ["resultado"=>"Telefone criado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show(Telefone $telefone)
    {
        return $telefone;
    }

    public function update(Request $request, Telefone $telefone)
    {
        $telefone->update($request->all());
        if($telefone)
        {
            return ["resultado"=>"Telefone actualizado com sucesso"];
        } else 
        {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }


    public function destroy(Telefone $telefone)
    {
        $telefone->delete();
        if($telefone)
        {
            return ["resultado"=>"Telefone deletado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }
    }
}
