<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{

    public function index()
    {
        return Artigo::with(['categorias','subcategorias','tipos'])->orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if($icon = $request->file('icon')){
            $destino = 'assets/images/artigo';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $artigo = Artigo::create($input);
        if($artigo){
            return ["resultado"=>"Artigo criado com sucesso"];
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
    public function show($id)
    {
        return Artigo::where(['id' => $id])->with(['categorias','subcategorias','tipos'])->get();
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        if($icon = $request->file('icon')){
            $destino = 'assets/images/artigo';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $artigo = Artigo::where(['id' => $id])->update($input);
        if($artigo){
            return ["resultado"=>"Artigo actulizado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    public function destroy(Artigo $artigo)
    {
        $artigo->delete();
        if($artigo)
        {
            return ["resultado"=>"Artigo deletado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }
    }
}
