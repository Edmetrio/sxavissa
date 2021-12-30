<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Aumento;
use App\Models\Models\Materia;
use App\Models\Models\Pagamento;
use App\Models\Models\Stock;
use App\Models\Models\Unidade;
use Illuminate\Http\Request;

class AumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigo = Artigo::orderBy('id', 'desc')->get();
        $pagamento = Pagamento::orderBy('id', 'desc')->get();
        $materia = Materia::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        return view('aumento', compact('artigo','pagamento','materia','unidade'));
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
    public function store(Request $request)
    {
        /* return $request->all(); */
        $request->validate([
            'pagamento_id' => 'required',
            'unidade_id' => 'required',
            'numerolote' => 'required',
            'quantidade' => 'required',
            'validade' => 'required',
        ]);

        $aumento = Aumento::create($request->all());
        $estoque = Stock::where(['artigo_id' => $request->artigo_id])->
        Stock::where(['artigo_id' => $request->artigo_id])->update(['quantidade' => $request->quantidade]);
        if ($aumento) {
            $request->session()->flash('status', 'Item Adicionado');
            return redirect('aumento');
        }
        $request->session()->flash('status', 'Erro ao Adicionar!');
        return redirect('aumento');

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
    public function destroy($id)
    {
        //
    }
}
