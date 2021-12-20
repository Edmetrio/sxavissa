<?php

namespace App\Http\Livewire;

use App\Models\Models\Subcategoria;
use App\Models\Models\Artigo;
use App\Models\Models\Categoria;
use App\Models\Models\Itemtransacao;
use Livewire\Component;

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

        $artigo = Artigo::where('nome', 'like' ,'%'.$this->search.'%')->
                            orWhere('codigobarra', 'like' ,'%'.$this->search.'%')->
                            with(['categorias','subcategorias','tipos','stocks'])->
                            orderBy('id', 'desc')->paginate(2);
        
        $itens = Itemtransacao::with(['transacaos','artigos'])->where('transacao_id', '33148d65-135b-4ad7-a08f-26c1d4af7b47')->get();
        $t = 0;
        foreach($itens as $item)
        {
        $item->valor_total = $item->quantidade * $item->artigos->preco; 
        $t += $item->valor_total;
        }
        $total = $t;
        return view('livewire.vendas', compact('artigo','itens','total'));
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)){
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }
}
