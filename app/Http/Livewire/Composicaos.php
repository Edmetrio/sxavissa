<?php

namespace App\Http\Livewire;

use App\Models\Models\Artigo;
use App\Models\Models\Composicao;
use App\Models\Models\Materia;
use App\Models\Models\Unidade;
use Livewire\Component;

class Composicaos extends Component
{

    public $search = '';

    public function render()
    {
        $composicao = Composicao::with(['artigos','materias','unidades'])->where('quantidade', '=' ,'%'.$this->search.'%')->get();
        $composicao->artigo = Artigo::orderBy('id', 'desc')->get();
        $composicao->unidade = Unidade::orderBy('id', 'desc')->get();
        $composicao->materia = Materia::orderBy('id', 'desc')->get();
        return view('livewire.composicaos', compact('composicao'));
    }
}
