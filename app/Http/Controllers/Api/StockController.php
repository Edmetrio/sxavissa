<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stock::with(['users','artigos','unidades','armazens'])->orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $stock = Stock::create($request->all());
        if($stock)
        {
            return ["resultado"=>"Stock criado com sucesso"];
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
    public function show(Stock $stock)
    {
        return $stock->with(['users','artigos','unidades','armazens'])->get();
    }

    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());
        if($stock)
        {
            return ["resultado"=>"Stock actualizado com sucesso"];
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
    public function destroy(Stock $stock)
    {
        $stock->delete();
        if($stock)
        {
            return ["resultado"=>"Stock deletado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao deletar"];
        }
    }
}
