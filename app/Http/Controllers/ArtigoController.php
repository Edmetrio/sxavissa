<?php

namespace App\Http\Controllers;

use App\Models\Models\Armazem;
use App\Models\Models\Artigo;
use App\Models\Models\Categoria;
use App\Models\Models\Stock;
use App\Models\Models\Subcategoria;
use App\Models\Models\Tipo;
use App\Models\Models\Unidade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:artigo-listar|artigo-criar|artigo-alterar|artigo-apagar', ['only' => ['index', 'store']]);
        $this->middleware('permission:artigo-criar', ['only' => ['create', 'store']]);
        $this->middleware('permission:artigo-alterar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:artigo-apagar', ['only' => ['destroy']]);
    }

    public function index()
    {
        $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->with(['categorias', 'subcategorias', 'tipos', 'stocks'])->orderBy('id', 'desc')->get();
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $tipo = Tipo::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $armazem = Armazem::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $unidade = Unidade::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        return view('artigos', compact('artigo', 'categoria', 'subcategoria', 'tipo', 'armazem', 'unidade'));
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
        return view('createArtigo', compact('categoria', 'tipo', 'subcategoria', 'armazem', 'unidade'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function validation()
    {
    }
    public function store(Request $request)
    {
        /* return $request->input(); */
        $request->validate([
            'codigobarra' => 'required|numeric',
            'nome' => 'required',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'tipo_id' => 'required',
            'preco' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $stocki = $request->all();
        if ($icon = $request->file('icon')) {
            $destino = 'assets/images/artigo';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $id = '3ce23584-56cc-45ce-853d-84c9965053bf';
        $idservico = '9ed66d9f-614f-4adc-994f-a205099e95a4';
        if ($id === $request->tipo_id || $request->tipo_id === 'Matéria-prima') {
            $artigo = Artigo::create($input);
            if ($artigo) {
                $request->session()->flash('status', 'Artigo adicionada');
                return redirect('artigos');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('artigos');
        } elseif ($idservico === $request->tipo_id || $request->tipo_id === 'Serviço') {
            $artigo = Artigo::create($input);
            if ($artigo) {
                $request->session()->flash('status', 'Artigo adicionada');
                return redirect('artigos');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('artigos');
        } else {
            /* return $request->input(); */
            $artigo = Artigo::create($input);
            $stocki['artigo_id'] = $artigo->id;
            $stock = Stock::create($stocki);
            if ($stock); {
                $request->session()->flash('status', 'Artigo adicionada');
                return redirect('artigos');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('artigos');
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

        $artigo = Artigo::with(['categorias', 'subcategorias', 'tipos', 'stocks'])->orderBy('id', 'desc')->find($id);
        $categoria = Categoria::orderBy('id', 'desc')->get();
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();

        $artigo = Artigo::find($id);
        $idmateria = '3ce23584-56cc-45ce-853d-84c9965053bf';
        $idservico = '9ed66d9f-614f-4adc-994f-a205099e95a4';
        $idproduto = '103ee92d-83c2-4ebb-8d88-8edc53e7e1e9';
        if ($idmateria === $artigo->tipo_id) {
            dd('materia');
            /* return view('livewire.materiaprimas', compact('categoria')); */
        } elseif ($idservico === $artigo->tipo_id) {
            dd('servico');
            /* return view('Servicos', compact('artigo', 'categoria', 'tipo', 'subcategoria', 'armazem', 'unidade')); */
        } elseif ($idproduto === $artigo->tipo_id) {
            /* dd('produto'); */
            return view('artigo.editartigoservico', compact('artigo', 'categoria', 'tipo', 'subcategoria', 'armazem', 'unidade'));
        } else {
           
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigobarra' => 'required|numeric',
            'nome' => 'required',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'tipo_id' => 'required',
            'preco' => 'required',
        ]);

        $input = $request->all();
        $stocki = $request->all();
        if ($icon = $request->file('icon')) {
            $destino = 'assets/images/artigo';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }
        $artigo = Artigo::find($id)->update($input);
        /* dd($artigo->artigo_id);
        $stock = Stock::where(['artigo_id' => $artigo->artigo_id])->update($stocki); */
        if ($artigo); {
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
        $stock = Artigo::find($id)->delete();
        if ($stock); {
            $request->session()->flash('status', 'Artigo Apagado');
            return redirect('artigos');
        }
        $request->session()->flash('status', 'Erro ao Apagar!');
        return redirect('artigos');
    }
}
