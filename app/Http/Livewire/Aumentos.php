<?php

namespace App\Http\Livewire;

use App\Models\Models\Armazem;
use App\Models\Models\Artigo;
use App\Models\Models\Aumento;
use App\Models\Models\Composicao;
use App\Models\Models\Materia;
use App\Models\Models\Pagamento;
use App\Models\Models\Unidade;
use Livewire\Component;

class Aumentos extends Component
{
    public $artigo;
    public $materia;

    public $selectedArtigo = NULL;
    public $show = false;

    public function mount()
    {
        $this->artigo = Artigo::all();
        $this->materia = collect();
    }
    public function render()
    {
        $artigo = Artigo::orderBy('id', 'desc')->get();
        $pagamento = Pagamento::orderBy('id', 'desc')->get();
        /* $materia = Materia::orderBy('id', 'desc')->get(); */
        $unidade = Unidade::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $aumento = Aumento::with(['artigos','users','pagamentos','unidades','materias','armazems'])->get();
        return view('livewire.aumentos', compact('aumento','artigo','pagamento','unidade','armazem'));
    }

    public function updatedSelectedArtigo($artigo_id)
    {
        if(!is_null($artigo_id)){
            $this->materia = Composicao::where('artigo_id', $artigo_id)->with('materias')->get();
            /* dd($this->materia); */
        } else {
            
        }
    }
}
