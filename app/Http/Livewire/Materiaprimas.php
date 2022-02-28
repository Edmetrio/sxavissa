<?php

namespace App\Http\Livewire;

use App\Models\Models\Armazem;
use App\Models\Models\Tipo;
use App\Models\Models\Categoria;
use App\Models\Models\Subcategoria;
use App\Models\Models\Unidade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Materiaprimas extends Component
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
        $tipo = Tipo::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $armazem = Armazem::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $unidade = Unidade::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        return view('livewire.materiaprimas', compact('tipo','subcategoria','armazem','unidade','categoria'));
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }
}
