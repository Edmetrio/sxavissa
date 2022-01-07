<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Composicao;
use App\Models\Models\Materia;
use App\Models\Models\Unidade;
use Illuminate\Http\Request;

class ComposicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigo = Artigo::orderBy('id', 'desc')->get();
        $materia = Materia::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        $composicao = Composicao::with(['artigos','materias','unidades'])->get();
        return view('composicao', compact('composicao','artigo','materia','unidade'));
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
        $request->validate([
            'artigo_id' => 'required',
            'materia_id' => 'required',
            'unidade_id' => 'required',
            'quantidade' => 'required',
        ]);

        $composicao = Composicao::create($request->all());
        if ($composicao) {
            $request->session()->flash('status', 'Composição realizada');
            return redirect('composicaos');
        }
        $request->session()->flash('status', 'Erro ao realizar!');
        return redirect('composicaos');
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
