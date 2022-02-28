<?php

namespace App\Http\Livewire;

use App\Models\Models\Artigo;
use App\Models\Models\Cotacao;
use App\Models\Models\Itemcotacao;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Itemcotacaos extends Component
{
    public $cotacaos;
    public $select;
    public $cotacaoid;

    public $selectedCotacao = NULL;
    public $selectedId = NULL;


    public function mount()
    {
        $this->cotacaos = Cotacao::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $this->select = collect();
        $this->cotacaoid = collect();
    }

    public function render()
    {
        $cotacao = Cotacao::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        /* $item = Cotacao::where('users_id', Auth::user()->id)->where('valortotal', null)->first(); */
        $item = Cotacao::where('users_id', Auth::user()->id)
                        ->where('estado', 'on')
                        ->where('valortotal', 0)
                        ->exists();
                        
        return view('livewire.itemcotacaos', compact('cotacao', 'artigo','item'));
    }

    public function updatedselectedCotacao($cotacaos)
    {
        if (!is_null($cotacaos)) {
            $this->select = Itemcotacao::where('cotacao_id', $cotacaos)
                ->with('cotacaos', 'artigos')
                ->orderBy('created_at', 'desc')
                ->get();
            $total = 0;
            foreach ($this->select as $i) {
                $i->subtotal = $i->quantidade * $i->artigos->preco;
                $total += $i->subtotal;
            }

            /* dd($this->select); */
                $this->cotacaoid = Cotacao::where('id', $cotacaos)
                                        ->with('itemartigo','itemcotacao')
                                        ->first();
                                        /* dd($this->user); */

        }
    }
   

}
