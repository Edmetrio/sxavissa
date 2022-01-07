<?php

namespace App\Http\Livewire;

use App\Models\Models\Artigo;
use App\Models\Models\Composicao;
use App\Models\Models\Materia;
use App\Models\Models\Unidade;
use Livewire\Component;

class Composicaos extends Component
{
    public $artigo;
    public $composicao;
    
    public $selectedArtigo = NULL;
    
    public function mount()
    {
        $this->artigo = Artigo::orderBy('created_at', 'desc')
                                ->where('tipo_id', '3ce23584-56cc-45ce-853d-84c9965053bf')
                                ->get();
        $this->composicao = collect();
    }

    public function render()
    {
        $composic = Composicao::with(['artigos','materias','unidades'])
                        ->orderBy('created_at', 'desc')->get();
        $composic->artigo = Artigo::orderBy('created_at', 'desc')->where('tipo_id', '3ce23584-56cc-45ce-853d-84c9965053bf')->get();
        $unidade = Unidade::orderBy('created_at', 'desc')->get();
        $materia = Materia::orderBy('created_at', 'desc')->get();
        return view('livewire.composicaos', compact('composic','materia','unidade'));
    }

    public function updatedSelectedArtigo($artigo_id)
    {
        if(!is_null($artigo_id)){
            $this->composicao = Composicao::where('artigo_id', $artigo_id)->get();
        }
    }
}
