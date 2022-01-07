<?php

namespace App\Http\Controllers;

use App\Models\Models\Categoria;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('categoria', compact('categoria'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('categoria');
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
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($icon = $request->file('icon')) {
            $destino = 'assets/images/categoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $categoria = Categoria::create($input);
        if ($categoria) {
            $request->session()->flash('status', 'Categoria adicionada');
            return redirect('categoria');
        }
        $request->session()->flash('status', 'Erro ao Adicionar!');
        return redirect('categoria');
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


    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('editCategoria', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            /* 'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', */
        ]);

        $input = $request->all();
        if ($icon = $request->file('icon')) {
            $destino = 'assets/images/categoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $categoria = Categoria::find($id)->update($input);
        if ($categoria) {
            $request->session()->flash('status', 'Categoria alterada');
            return redirect('categoria');
        }
        $request->session()->flash('status', 'Erro a Alterar!');
        return redirect('categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $categoria = Categoria::where(['id'=> $id])->delete();
        if ($categoria) {
            $request->session()->flash('status', 'Categoria alterada');
            return redirect('categoria');
        }
        $request->session()->flash('status', 'Erro a Alterar!');
        return redirect('categoria');
    }
}
