<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\Itemhistorico;
use App\Models\Models\Itemtransacao;
use Illuminate\Http\Request;

class ItemhistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Itemhistorico::with(['historicos','artigos'])->orderBy('id', 'desc')->get();
    }

    public function store(Request $request, Itemhistorico $itemhistorico)
    {
        $itemhistorico->create($request->all());
        if($itemhistorico)
        {
            return ["resultado"=>"item historico adicionado com sucesso"];
        } else {
            return ["resultado"=>"Erro ao Adicionar"];
        }

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
