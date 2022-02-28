<?php

namespace App\Http\Controllers;

use App\Models\Models\Cotacao;
use App\Models\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = Titulo::all();
        $cotacao = Cotacao::where('idacesso', Auth::user()->idacesso)->with(['itemartigo', 'itemcotacao', 'titulos'])->orderBy('created_at', 'desc')->get();
        return view('cotacao.cotacao', compact('titulo', 'cotacao'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        if (isset($request->cotacao)) {
        } else {
            $request->validate([
                'titulo_id' => 'required',
                'nome' => 'required',
                'endereco' => 'required',
                'telefone' => 'required',
                'nuit' => 'required',
            ]);

            Cotacao::create($request->all());
            return redirect()->route('cotacao.index')
                ->with('status', 'Empresa Adicionada');
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
        $cotacao = Cotacao::find($id);
        return view('cotacao.editCotacao', compact('cotacao'));
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
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'nuit' => 'required',
        ]);
        Cotacao::find($id)->update($request->all());
        return redirect()->route('cotacao.index')
            ->with('status', 'Empresa Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotacao $cotacao)
    {
        $cotacao->delete();
        return redirect()->route('cotacao.index')
            ->with('status', 'Empresa Apagada com sucesso');
    }
}
