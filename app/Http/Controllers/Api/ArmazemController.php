<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Armazem;
use Illuminate\Http\Request;

class ArmazemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Armazem::latest()->get();
    }

    public function store(Request $request, Armazem $armazem)
    {
        $armazem->create($request->all());
        if ($armazem) {
            return ["resultado" => "Armazém criada com sucesso"];
        } else {
            return ["resultado" => "Erro ao Adicionar"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Armazem $armazem)
    {
        return $armazem;
    }

    public function update(Request $request, Armazem $armazem)
    {
        $armazem->update($request->all());
        if ($armazem) {
            return ["resultado" => "Armazém actualizado com sucesso"];
        } else {
            return ["resultado" => "Erro ao Actualizar"];
        }
    }

    public function destroy(Armazem $armazem)
    {
        $armazem->delete();
        if($armazem){
            return ["resultado" => "Armazém deletado com sucesso"];
        } else {
            return ["resultado" => "Erro ao Deletar"];
        }
    }
}
