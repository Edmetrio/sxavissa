<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categoria::orderBy('id', 'asc')->get();
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if($icon = $request->file('icon')){
            $destino = 'assets/images/categoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        }

        $categoria = Categoria::create($input);
        if($categoria){
            return ["resultado"=>"Categoria criada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }
    }

    public function show($id)
    {
        return Categoria::where(['id' => $id])->get();
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        if($icon = $request->file('icon')){
            $destino = 'assets/images/categoria';
            $perfil = date('YmHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $categoria = Categoria::where(['id' => $id])->update($input);
        if($categoria){
            return ["resultado"=>"Categoria Actualizada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Actualizar"];
        }
    }

    public function destroy($id)
    {
        $categoria = Categoria::where(['id'=> $id])->delete();
        if($categoria){
            return ["resultado"=>"Categoria deletada com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Actualizar"];
        }
        
    }
}
