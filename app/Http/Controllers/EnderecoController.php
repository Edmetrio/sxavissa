<?php

namespace App\Http\Controllers;

use App\Models\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endereco = Endereco::with(['perfils'])->OrderBy('id', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Endereco $endereco)
    {
        $request->validate([
            'nome' => 'required|min:5',
            'users_id' => 'required'
       ]);

       $end = $endereco->create($request->all());
       if ($end) {
        $request->session()->flash('status', 'Endereço Adicionado');
        return redirect('perfil');
    }
    $request->session()->flash('status', 'Erro ao Adicionar Endereço!');
    return redirect('perfil');
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
        $endereco = Endereco::find($id);
        return view('endereco', compact('endereco'));
    }


    public function update(Request $request, Endereco $endereco)
    {
       $request->validate([
            'nome' => 'required|min:5',
            'users_id' => 'required'
       ]);

       $end = $endereco->update($request->all());
       if ($end) {
        $request->session()->flash('status', 'Endereço Actualizado');
        return redirect('perfil');
    }
    $request->session()->flash('status', 'Erro ao Actualizar Endereço!');
    return redirect('perfil');
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
