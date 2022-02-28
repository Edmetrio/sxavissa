<?php

namespace App\Http\Controllers;

use App\Models\Models\Categoria;
use App\Models\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:subcategoria-listar|subcategoria-criar|subcategoria-alterar|subcategoria-apagar', ['only' => ['index','store']]);
         $this->middleware('permission:subcategoria-criar', ['only' => ['create','store']]);
         $this->middleware('permission:subcategoria-alterar', ['only' => ['edit','update']]);
         $this->middleware('permission:subcategoria-apagar', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->with(['categorias'])->where('estado', 'on')->orderBy('created_at', 'desc')->get();
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->where('estado', 'on')->get();
        return view('subcategoria', compact('subcategoria','categoria'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->with(['subcategorias'])->orderBy('id', 'desc')->get();
        return view('createSubcategoria', compact('categoria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/subcategoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria = Subcategoria::create($input);
        if($subcategoria)
            {
                $request->session()->flash('status', 'Subcategoria adicionada');
                return redirect('subcategoria');
            }
            $request->session()->flash('status', 'Erro ao Adicionar!');
            return redirect('subcategoria');
    }

 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->with('categorias')->find($id);
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        return view('editSubcategoria', compact('subcategoria','categoria'));
    }


    public function update(Request $request, Subcategoria $subcategoria, $id)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            /* 'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', */
        ]);

        $input = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/subcategoria';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria = Subcategoria::find($id)->update($input);
        if($subcategoria)
            {
                $request->session()->flash('status', 'Subcategoria Alterada');
                return redirect('subcategoria');
            }
            $request->session()->flash('status', 'Erro ao Alterar!');
            return redirect('subcategoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategoria $subcategoria, $id, Request $request)
    {
        $subcategoria->where(['id' => $id])->delete();
        if ($subcategoria) {
            $request->session()->flash('status', 'Categoria alterada');
            return redirect('subcategoria');
        }
        $request->session()->flash('status', 'Erro a Alterar!');
        return redirect('subcategoria');
    }
}
