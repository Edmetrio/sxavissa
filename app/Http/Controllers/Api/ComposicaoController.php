<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Composicao;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class ComposicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Composicao::with(['artigos','unidades'])->get();
    }

    public function store(Request $request)
    {
        $composicao = Composicao::create($request->all());
        if($composicao)
        {
            return ["resultado"=>"Composição criada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return Composicao::where(['id' => $id])->with(['artigos','unidades'])->get();
    }

    public function update(Request $request, Composicao $composicao)
    {
        $composicao->update($request->all());
        if($composicao)
        {
            return ["resultado"=>"Composição actualizada com sucesso"];
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
    public function destroy(Composicao $composicao)
    {
        $composicao->delete();
        if($composicao)
        {
            return ["resultado"=>"Composição deletada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Deletar"];
        }
    }
}
