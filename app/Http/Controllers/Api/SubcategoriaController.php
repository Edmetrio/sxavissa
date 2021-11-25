<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Categoria;
use App\Models\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subcategoria::with(['categorias'])->orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if($icon = $request->file('icon')){
            $destino = 'assets/images/subcategoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria = Subcategoria::create($input);
        if($subcategoria){
            return ["resultado"=>"SubCategoria criada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return Subcategoria::where(['id' => $id])->with(['categorias'])->get();
    }

    public function update(Request $request, Subcategoria $subcategoria, $id)
    {
        $input = $request->all();

        if($icon = $request->file('icon')){
            $destino = 'assets/images/subcategoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria->where(['id' => $id])->update($input);
        if($subcategoria){
            return ["resultado"=>"SubCategoria actualizada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function destroy(Subcategoria $subcategoria, $id)
    {
        $subcategoria->where(['id' => $id])->delete();
        if($subcategoria)
        {
            return ["resultado"=>"Subcategoria deletada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }
    }
}
