<?php

namespace App\Http\Livewire;

use App\Models\Models\Subcategoria;
use App\Models\Models\Artigo;
use App\Models\Models\Categoria;
use App\Models\Models\Itemtransacao;
use App\Models\Models\Pagamento;
use App\Models\Models\Transacao;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class Vendas extends Component
{

    public $categoria;
    public $subcategoria;

    public $search = '';

    public $selectedCategoria = NULL;


    public function mount()
    {
        $this->categoria = Categoria::orderBy('id', 'desc')->get();
    }

    public function render()
    {

        /* $categoria = Categoria::where('estado', 'on')->get();
        dd($categoria); */
        $artigo = Artigo::where('nome', 'like', '%' . $this->search . '%')
                        ->orWhere('codigobarra', 'like', '%' . $this->search . '%')
                        ->with(['categorias', 'subcategorias', 'tipos', 'stocks'])
                        ->orderBy('id', 'desc')->get();
                        /* dd($artigo); */
       
        $user = Auth::user()->id;
        $transacao = Transacao::latest()->where('users_id', $user)->first();
        $pagamento = Pagamento::orderBy('id', 'desc')->get();

        if (isset($transacao)) {
            $itens = Itemtransacao::with(['transacaos', 'artigos'])->where('transacao_id', $transacao->id)->get();
            $t = 0;
            foreach ($itens as $item) {
                $item->valor_total = $item->quantidade * $item->artigos->preco;
                $t += $item->valor_total;
            }
            $total = $t;
            $itens->iva = $iva = $t * 0.17;
            $itens->total = $iva + $t;
            
            
            return view('livewire.vendas', compact('artigo', 'itens', 'total', 'transacao','pagamento'));
        } else {
            $itens = Itemtransacao::with(['transacaos', 'artigos'])->get();
            return view('livewire.vendas', compact('itens'));
        }
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }

}