<?php

namespace App\Http\Livewire;

use App\Models\Models\Armazem;
use App\Models\Models\Artigo;
use App\Models\Models\Subcategoria;
use App\Models\Models\categoria;
use App\Models\Models\Tipo;
use App\Models\Models\Unidade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Servicos extends Component
{

    public $search = '';

    public $selectedCategoria = NULL;

    public function mount()
    {
        $this->categoria = Categoria::orderBy('id', 'desc')->get();
        $this->tipo = Tipo::orderBy('id', 'desc')->get();
    }

    
    public function render()
    {
       /*  $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->where('nome', 'like', '%' . $this->search . '%')->orWhere('codigobarra', 'like', '%' . $this->search . '%')->with(['categorias', 'subcategorias', 'tipos', 'stocks'])->orderBy('id', 'desc')->paginate(10); */
        
        $tipo = Tipo::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $armazem = Armazem::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $unidade = Unidade::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        return view('livewire.servicos', compact('tipo','subcategoria','armazem','unidade','categoria'));
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }
}
