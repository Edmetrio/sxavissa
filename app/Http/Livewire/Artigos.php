<?php

namespace App\Http\Livewire;
use App\Models\Models\Subcategoria;
use App\Models\Models\Artigo;
use App\Models\Models\Tipo;
use App\Models\Models\Armazem;
use App\Models\Models\Unidade;
use App\Models\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Artigos extends Component
{
    public $categoria;
    public $subcategoria;
    public $tipo;
    public $tipos;

    public $search = '';

    public $selectedCategoria = NULL;
    public $selectedTipo = NULL;

    /* function __construct()
    {
         $this->middleware('permission:artigo-listar|artigo-criar|artigo-alterar|artigo-apagar', ['only' => ['index','store']]);
         $this->middleware('permission:artigo-criar', ['only' => ['create','store']]);
         $this->middleware('permission:artigo-alterar', ['only' => ['edit','update']]);
         $this->middleware('permission:artigo-apagar', ['only' => ['destroy']]);
    } */

    public function mount()
    {
        $this->categoria = Categoria::orderBy('id', 'desc')->get();
        $this->tipo = Tipo::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->where('nome', 'like' ,'%'.$this->search.'%')->
                            orWhere('codigobarra', 'like' ,'%'.$this->search.'%')->
                            with(['categorias','subcategorias','tipos','stocks'])->
                            orderBy('id', 'desc')->paginate(10);
                            
        $tipo = Tipo::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $armazem = Armazem::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $unidade = Unidade::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('id', 'desc')->get();
  
        /* $procurar = Categoria::where('estado', 'like' ,'%'.$this->search.'%')->get(); */
        
        return view('livewire.artigos', compact('artigo','tipo','subcategoria','armazem','unidade','categoria'));
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)){
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }

    public function updatedSelectedTipo($tipo_id)
    {
        if (!is_null($tipo_id))
        {
            $this->tipos = Tipo::where('id', $tipo_id)
                                ->where('nome', 'Matéria-prima')
                                ->get();
            /* dd($this->tipos) */;
        }
    }
}
