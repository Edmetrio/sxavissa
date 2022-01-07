<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Materia;
use App\Models\Models\Stock;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materia = Artigo::all();
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
            'nome' => 'required|unique:materia,nome',
            'preco' => 'required',
            'stockminimo' => 'required',
            'quantidade' => 'required',
            'armazem_id' => 'required',
            'unidade_id' => 'required',
        ]);
        $stocki = $request->all();
        $materia = Materia::create($request->all());
        $stocki['materia_id'] = $materia->id;
        $stock = Stock::create($stocki);
        if($stock);
            {
                $request->session()->flash('status', 'Matéria-Prima adicionada');
                return redirect('materia');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('materia');
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
