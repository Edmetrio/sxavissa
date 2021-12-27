<?php

namespace App\Http\Controllers;

use App\Models\Models\Armazem;
use App\Models\Models\Artigo;
use App\Models\Models\Categoria;
use App\Models\Models\Stock;
use App\Models\Models\Subcategoria;
use App\Models\Models\Tipo;
use App\Models\Models\Unidade;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigo = Artigo::with(['categorias','subcategorias','tipos','stocks'])->orderBy('id', 'desc')->get();
        $categoria = Categoria::orderBy('id', 'desc')->get();
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        return view('artigos', compact('artigo','categoria','subcategoria','tipo','armazem','unidade')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::orderBy('id', 'desc')->get();
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        return view('createArtigo', compact('categoria', 'tipo','subcategoria','armazem','unidade'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function validation()
    {
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'codigobarra' => 'required|numeric',
            'nome' => 'required|unique:artigo,nome|min:5',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'tipo_id' => 'required',
            'preco' => 'required',
            'iva' => 'required',
            'desconto' => 'required',
            'armazem_id' => 'required',
            'quantidade' => 'required',
            'stockminimo' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $stocki = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/artigo';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $artigo = Artigo::create($input);
        $stocki['artigo_id'] = $artigo->id;
        $stock = Stock::create($stocki);
        if($stock);
            {
                $request->session()->flash('status', 'Artigo adicionada');
                return redirect('artigos');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('artigos');
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
        $artigo = Artigo::with(['categorias','subcategorias','tipos', 'stocks'])->orderBy('id', 'desc')->find($id);
        $categoria = Categoria::orderBy('id', 'desc')->get();
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        return view('editArtigo', compact('artigo', 'categoria', 'tipo','subcategoria','armazem','unidade'));
    }

    public function update(Request $request, $id)
    {
        /* $request->validate([
            'codigobarra' => 'required|numeric',
            'nome' => 'required',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'tipo_id' => 'required',
            'preco' => 'required',
            'iva' => 'required',
            'desconto' => 'required',
            'armazem_id' => 'required',
            'quantidade' => 'required',
            'stockminimo' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); */

        $input = $request->all();
        $stocki = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/artigo';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }
        $artigo = Artigo::find($id)->update($input);
        /* $stock = Stock::where(['artigo_id' => $id])->update($stocki); */
        if($artigo);
            {
                $request->session()->flash('status', 'Artigo Alterada');
                return redirect('artigos');
            }
            $request->session()->flash('status', 'Erro ao Alterar!');
            return redirect('artigos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        dd($id);
        
        /* $stock = Artigo::find($id)->delete();
        if($stock);
            {
                $request->session()->flash('status', 'Artigo Apagado');
                return redirect('artigos');
            }
            $request->session()->flash('status', 'Erro ao Apagar!');
            return redirect('artigos'); */
    }
}
