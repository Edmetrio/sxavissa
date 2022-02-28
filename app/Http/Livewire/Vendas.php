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
        /* $artigo = Artigo::where('nome', 'like', '%' . $this->search . '%')
                        ->orWhere('codigobarra', 'like', '%' . $this->search . '%')
                        ->with(['categorias', 'subcategorias', 'tipos', 'stocks'])
                        ->orderBy('created_at', 'desc')->paginate(4); */
                        /* dd($artigo); */
        /* $artigo = Artigo::where('tipo_id', '103ee92d-83c2-4ebb-8d88-8edc53e7e1e9')
                        ->orwhere('tipo_id', '3ce23584-56cc-45ce-853d-84c9965053bf')
                        ->where('nome', 'like', '%' . $this->search . '%')
                        ->orwhere('codigobarra', 'like', '%' . $this->search . '%')
                        ->get(); */
                                        /* dd($artigo); */
                        /* $artigo = $artigos::where('nome', 'like', '%' . $this->search . '%')->get(); */
                        $artigo = Artigo::whereNotIn('tipo_id', ['9ed66d9f-614f-4adc-994f-a205099e95a4'])
                        ->where('nome', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $user = Auth::user()->id;
        $transacao = Transacao::latest()->where('users_id', $user)->first();
        $pagamento = Pagamento::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();

        if (isset($transacao)) {
            $itens = Itemtransacao::with(['transacaos', 'artigos'])->where('transacao_id', $transacao->id)->get();
            $t = 0;
            foreach ($itens as $item) {
                $item->valor_total = $item->quantidade * $item->artigos->preco;
                $t += $item->valor_total;
            }
            $total = $t;
            $itens->iva = $iva = $t * 0.17;
            $itens->total = $t;

            return view('livewire.vendas', compact('artigo', 'itens', 'total', 'transacao','pagamento'));
        } else {
            $itens = Itemtransacao::with(['transacaos', 'artigos'])->get();
            return view('livewire.vendas', compact('itens'));
        }
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->where('categoria_id', $categoria_id)->get();
        }
    }

}