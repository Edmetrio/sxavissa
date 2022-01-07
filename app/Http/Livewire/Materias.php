<?php

namespace App\Http\Livewire;

use App\Models\Models\Armazem;
use App\Models\Models\Unidade;
use App\Models\Models\Categoria;
use App\Models\Models\Materia;
use App\Models\Models\Stock;
use Livewire\Component;

class Materias extends Component
{
    public function mount()
    {
        $this->categoria = Categoria::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        $unidade = Unidade::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();

        $materia = Materia::orderBy('id', 'desc')->with(['stocks'])->get();
        return view('livewire.materias', compact('unidade','armazem','materia'));

    }

    
}
