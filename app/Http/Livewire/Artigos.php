<?php

namespace App\Http\Livewire;
use App\Models\Models\Subcategoria;
use App\Models\Models\Artigo;
use App\Models\Models\Tipo;
use App\Models\Models\Armazem;
use App\Models\Models\Unidade;
use App\Models\Models\Categoria;

use Livewire\Component;

class Artigos extends Component
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
                            orderBy('id', 'desc')->paginate(5);
                            
        $tipo = Tipo::orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::orderBy('id', 'desc')->get();
        $armazem = Armazem::orderBy('id', 'desc')->get();
        $unidade = Unidade::orderBy('id', 'desc')->get();
        $categoria = Categoria::orderBy('id', 'desc')->get();
  
        /* $procurar = Categoria::where('estado', 'like' ,'%'.$this->search.'%')->get(); */
        
        return view('livewire.artigos', compact('artigo','tipo','subcategoria','armazem','unidade','categoria'));
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)){
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }
}
