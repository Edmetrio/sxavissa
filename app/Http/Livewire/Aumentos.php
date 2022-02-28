<?php

namespace App\Http\Livewire;

use App\Models\Models\Armazem;
use App\Models\Models\Artigo;
use App\Models\Models\Aumento;
use App\Models\Models\Composicao;
use App\Models\Models\Itempagamento;
use App\Models\Models\Materia;
use App\Models\Models\Pagamento;
use App\Models\Models\Unidade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Aumentos extends Component
{
    public $quantidade, $pagamento_id, $aumento_id, $aumentos, $inputs = [], $i = 1;
    public $unidade_id, $armazem_id, $numerolote, $validade, $artigo_id;
    public $artigo;
    public $materia;

    public $selectedArtigo = NULL;
    public $show = false;

    public function mount()
    {
        $this->artigo = Artigo::all();
        $this->materia = collect();
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($id)
    {
        unset($this->inputs[$id]);
    }

    public function render()
    {
        $artigo = Artigo::orderBy('id', 'desc')->get();
        $pagamento = Pagamento::orderBy('id', 'desc')->get();
        /* $materia = Materia::orderBy('id', 'desc')->get(); */
        $unidade = Unidade::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $aumento = Aumento::with(['artigos', 'users', 'pagamentos', 'unidades', 'materias', 'armazems'])->get();
        return view('livewire.aumentos', compact('aumento', 'artigo', 'pagamento', 'unidade', 'armazem'));
    }

    public function updatedSelectedArtigo($artigo_id)
    {
        if (!is_null($artigo_id)) {
            $this->materia = Composicao::where('artigo_id', $artigo_id)->with('materias')->get();
            /* dd($this->materia); */
        } else {
        }
    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'unidade_id' => 'required',
                'armazem_id' => 'required',
                'numerolote' => 'required',
                'validade' => 'required',

                'quantidade.0' => 'required',
                'pagamento_id.0' => 'required',
                'quantidade.*' => 'required',
                'pagamento_id.*' => 'required'
            ],
            [
                'quantidade.0.required' => 'Preenche a quantidade',
                'pagamento_id.0.required' => 'Preenche o tipo de pagamento',
                'quantidade.*.required' => 'Preenche a quantidade',
                'pagamento_id.*.required' => 'Preenche o tipo de pagamento',

                'unidade_id.required' => 'Seleccione a unidade',
                'armazem_id.required' => 'Seleccione o armazem',
                'numerolote.required' => 'Preenche o numero de lote',
                'validade.required' => 'Seleccione a validade'
            ]
        );

        $validatedDate['artigo_id'] = $this->selectedArtigo;
        dd($validatedDate);
        $aumento = Aumento::create($validatedDate);
        dd($aumento->id);
        foreach ($this->quantidade as $key => $value) 
        {
            Itempagamento::create([
                
                'users_id' => Auth::user()->id,
                'idacesso' => Auth::user()->idacesso,
                'valortotal' => $this->quantidade[$key], 
                'pagamento_id' => $this->pagamento_id[$key]
            ]);
        }

        $this->inputs = [];

        session()->flash('status', 'Pagamento adicionado com sucesso.');
    }
}
