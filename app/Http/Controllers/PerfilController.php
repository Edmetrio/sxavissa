<?php

namespace App\Http\Controllers;

use App\Models\Models\Armazem;
use App\Models\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = User::with(['telefones','perfils','enderecos','armazems'])->where('id', Auth::id())->first();
        return view('perfil.perfil', compact('perfil'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.editPerfil');
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
            'nuit' => 'required|numeric',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/users';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        /* return Auth::user()->id; */
        $subcategoria = Perfil::create($input);
        User::where('id', Auth::user()->id)->update(['icon' => $perfil]);
        if($subcategoria)
            {
                $request->session()->flash('status', 'Perfil Adicionado');
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
        $perfil = Perfil::find($id);
        /* dd($perfil); */
        return view('perfil.editPerfil', compact('perfil'));
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
            'nuit' => 'required',
        ]);

        $input = $request->all();
        if($icon = $request->file('icon')){
            $destino = 'assets/images/users';
            $perfil = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destino, $perfil);
            $input['icon'] = "$perfil";
        } else {
            unset($input['icon']);
        }

        $subcategoria = Perfil::find($id)->update($input);
        User::where('id', Auth::user()->id)->update(['icon' => $perfil]);
        if($subcategoria)
            {
                $request->session()->flash('status', 'Perfil Actualizado');
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
    public function destroy(Request $request, Perfil $perfil)
    {
        $perfil->delete();
        if($perfil)
        {
            $request->session()->flash('status', 'Perfil Deletado');
            return redirect('perfil');
        }
        $request->session()->flash('status', 'Erro ao Deletar!');
        return redirect('perfil');
    }
}
