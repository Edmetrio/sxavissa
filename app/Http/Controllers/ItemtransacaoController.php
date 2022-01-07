<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Composicao;
use App\Models\Models\Itemtransacao;
use App\Models\Models\Stock;
use App\Models\Models\Tipo;
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
        if ($request->tipo_id === '3ce23584-56cc-45ce-853d-84c9965053bf' || $request->tipo_nome === 'Matéria-prima') {
            $item = Composicao::where('artigo_id', $request->artigo_id)->with(['materias'])->get();
            foreach ($item as $i) {
                $stock = Stock::where('materia_id', $i->materias->id)->with('materias')->first();
                    $multi = $i->quantidade * $request->quantidade;
                    $diminui = $stock->quantidade - $multi;
                if ($stock->quantidade >= $multi && $multi >= 1) {
                    $stock = Stock::where('materia_id', $i->materias->id)->update(['quantidade' => $diminui]);
                } else {
                    $request->session()->flash('status', 'Quantidade Inexistente!');
                    return redirect('vendas');
                }
            }
            $itens->create($request->all());
            $request->session()->flash('status', 'Item adicionado');
            return redirect('vendas');
        } else {
            $artigo = Stock::where('artigo_id', $request->artigo_id)->with('artigos')->first();
            if ($artigo->quantidade >= $request->quantidade && $request->quantidade >= 1) {
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
        $item = Itemtransacao::where('id', $id)->with('artigos')->first();
        $nome = Tipo::find($item->artigos->tipo_id);
        if ($item->artigos->tipo_id === '3ce23584-56cc-45ce-853d-84c9965053bf' || $nome === 'Matéria-prima') {
            $composicao = Composicao::where('artigo_id', $item->artigos->id)->get();
            foreach ($composicao as $c) {
                $stock = Stock::where('materia_id', $c->materia_id)->first();
                $multi = $c->quantidade * $item->quantidade;
                $aumento = $stock->quantidade + $multi;
                $stock->update(['quantidade' => $aumento]);
            }
            $items = $item->delete();
            if ($items) {
                $request->session()->flash('status', 'Item Apagado');
                return redirect('vendas');
            }
            $request->session()->flash('status', 'Erro ao Apagar!');
            return redirect('vendas');
        } else {
            $stock = Stock::where('artigo_id', $item->artigo_id)->first();
            $aumento = $stock->quantidade + $item->quantidade;

            $stock->update(['quantidade' => $aumento]);
            $items = $item->delete();
            if ($items) {
                $request->session()->flash('status', 'Item Apagado');
                return redirect('vendas');
            }
            $request->session()->flash('status', 'Erro ao Apagar!');
            return redirect('vendas');
        }
    }
}
