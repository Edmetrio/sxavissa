<?php

namespace App\Http\Livewire;

use App\Models\Models\Subcategoria;
use App\Models\Models\Artigo;
use App\Models\Models\Tipo;
use App\Models\Models\Armazem;
use App\Models\Models\Unidade;


use Livewire\Component;



class Categoria extends Component
{

    public $message = 'Apenas um test';

    public function render()
    {
        $artigo = Artigo::with(['categorias','subcategorias','tipos','stocks'])->orderBy('id', 'desc')->get();
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        return view('livewire.categoria', compact('artigo','tipo','subcategoria','armazem','unidade'));
    }
}
