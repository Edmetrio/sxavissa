<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Categoria;
use App\Models\Models\Stock;
use App\Models\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::user()->id))
        {
            $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->count();
            $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->count();
            $estoque = Stock::where('idacesso', Auth::user()->idacesso)->count();
            /* dd($categoria); */
            $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->count();
            return view('inicio', compact('subcategoria','categoria','artigo','estoque'));
        } else {
            return view('inicio');
        }
        
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
        //
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
