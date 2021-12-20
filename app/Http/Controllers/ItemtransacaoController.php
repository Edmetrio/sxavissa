<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Itemtransacao;
use App\Models\Models\Stock;
use Illuminate\Http\Request;

class ItemtransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Itemtransacao $itens)
    {

        $artigo = Stock::where('artigo_id', $request->artigo_id)->with('artigos')->first();
        if ($artigo->quantidade >= $request->quantidade) {
            $diminui = $artigo->quantidade - $request->quantidade;
            $itens->create($request->all());
            if ($itens) {
                Stock::where('artigo_id', $request->artigo_id)->update(['quantidade' => $diminui]);
                $request->session()->flash('status', 'Item adicionado');
                return redirect('vendas');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('vendas');
        } else {
            $request->session()->flash('status', 'Desculpa, quantidade Inexistente!');
            return redirect('vendas');
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
    public function destroy(Request $request, $id)
    {
        $item = Itemtransacao::find($id)->with('artigos')->first();
        $stock = Stock::where('artigo_id', $item->artigo_id)->first();
        $aumento = $stock->quantidade + $item->quantidade;

        $stock->update(['quantidade' => $aumento]);
        $item = Itemtransacao::find($id)->delete(); 
        if($item)
        {
            $request->session()->flash('status', 'Item Apagado');
            return redirect('vendas');
        }
        $request->session()->flash('status', 'Erro ao Apagar!');
        return redirect('vendas');
    }
}
