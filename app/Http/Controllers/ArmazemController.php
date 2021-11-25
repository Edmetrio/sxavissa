<?php

namespace App\Http\Controllers;

use App\Models\Models\Armazem;
use Illuminate\Http\Request;

class ArmazemController extends Controller
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
        return view('armazem');
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
            'numero' => 'required|numeric',
            'nome' => 'required|unique:artigo,nome|min:5',
            'local' => 'required',
            'users_id' => 'required'
        ]);
        $input = $request->all();
        $input['users_id'] = $request->users_id;
        $armazem = Armazem::create($input);
        if ($armazem) {
            $request->session()->flash('status', 'Armazém Adicionado');
            return redirect('perfil');
        }
        $request->session()->flash('status', 'Erro ao Adicionar Armazém!');
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
        $armazem = Armazem::find($id);
        return view('armazem', compact('armazem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Armazem $armazem)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'nome' => 'required|unique:artigo,nome|min:5',
            'local' => 'required',
            'users_id' => 'required'
        ]);
        
        $a = $armazem->update($request->all());
        if ($a) {
            $request->session()->flash('status', 'Armazém Adicionado');
            return redirect('perfil');
        }
        $request->session()->flash('status', 'Erro ao Adicionar Armazém!');
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
