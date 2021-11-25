<?php

namespace App\Http\Controllers;

use App\Models\Models\Operadora;
use App\Models\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
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
        $operadora = Operadora::OrderBy('id','desc')->get();
        return view('telefone', compact('operadora'));
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
            'numero' => 'required',
            'users_id' => 'required',
            'operadora_id' => 'required',
        ]);

        $telefone = Telefone::create($request->all());
        if($telefone)
            {
                $request->session()->flash('status', 'Telefone Actualizado');
                return redirect('perfil');
            }
            $request->session()->flash('status', 'Erro ao Alterar!');
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
        $operadora = Operadora::OrderBy('id','desc')->get();
        $telefone = Telefone::find($id);
        return view('telefone', compact('operadora','telefone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefone $telefone)
    {
        $request->validate([
            'numero' => 'required',
            'users_id' => 'required',
            'operadora_id' => 'required',
        ]);

        $telefone = $telefone->update($request->all());
        if($telefone)
            {
                $request->session()->flash('status', 'Telefone Actualizado');
                return redirect('perfil');
            }
            $request->session()->flash('status', 'Erro ao Alterar!');
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
