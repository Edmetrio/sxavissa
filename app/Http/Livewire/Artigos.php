<?php

namespace App\Http\Livewire;

use App\Models\Models\Subcategoria;
use App\Models\Models\Artigo;
use App\Models\Models\Tipo;
use App\Models\Models\Armazem;
use App\Models\Models\Unidade;
use App\Models\Models\Categoria;
use App\Models\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class Artigos extends Component
{
    use WithFileUploads;
    public $selectData = true;
    public $createData = false;
    public $updateData = true;

    //Servico
    public $createServicoData = true;
    public $updateServicoData = true;

    //Matéria-prima
    public $createMData = true;
    public $updateMData = true;
    //create
    public $users_id, $idacesso, $codigobarra, $categoria_id,
        $subcategoria_id, $tipo_id, $nome, $icon, $preco, $iva,
        $desconto, $garantia, $armazem_id, $unidade_id, $stockminimo, $quantidade;

    public $edits_users_id, $edits_idacesso, $edits_codigobarra, $edits_categoria_id,
        $edits_subcategoria_id, $edits_tipo_id, $edits_nome, $edits_icon, $edits_preco, $edits_iva,
        $edits_desconto, $edits_garantia, $edits_armazem_id, $edits_unidade_id, $edits_stockminimo, $edits_quantidade, $edit_servico, $new_icon, $old_icon;

    public $editp_users_id, $editp_idacesso, $editp_codigobarra, $editp_categoria_id,
        $editp_subcategoria_id, $editp_tipo_id, $editp_nome, $editp_icon, $editp_preco, $editp_iva,
        $editp_desconto, $editp_garantia, $editp_armazem_id, $editp_unidade_id, $editp_stockminimo,
        $editp_quantidade, $editp_servico, $newp_icon, $oldp_icon, $idP;

    public $editm_users_id, $editm_idacesso, $editm_codigobarra, $editm_categoria_id,
        $editm_subcategoria_id, $editm_tipo_id, $editm_nome, $editm_icon, $editm_preco, $editm_iva,
        $editm_desconto, $editm_garantia, $editm_armazem_id, $editm_unidade_id, $editm_stockminimo,
        $editm_quantidade, $newm_icon, $oldm_icon, $idM;

    //edit produto
    public $editp_armazem_nome;
    public $editp_unidade_nome;

    public $editm_servico;

    public $news_icon, $olds_icon;

    public $categoria;
    public $subcategoria;
    public $tipo;
    public $tipos;
    public $randow;



    public $search = '';

    public $selectedCategoria = NULL;
    public $selectedTipo = NULL;

    public $selectedCategoriaS = NULL;

    public function mount()
    {
        $this->categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $this->subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $this->tipo = Tipo::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->where('nome', 'like', '%' . $this->search . '%')->with(['categorias', 'subcategorias', 'tipos', 'stocks'])->orderBy('created_at', 'desc')->paginate(10);

        $tipo = Tipo::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $subcategoria = Subcategoria::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $armazem = Armazem::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $unidade = Unidade::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $categoria = Categoria::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $rand = random_int(100000, 999999);
        $procurar = Categoria::where('idacesso', Auth::user()->idacesso)->where('estado', 'like', '%' . $this->search . '%')->get();
        return view('livewire.artigos', compact('artigo', 'tipo', 'subcategoria', 'armazem', 'unidade', 'categoria'));
    }

    public function random()
    {
        $this->codigobarra = random_int(100000, 999999);
        
    }

    private function resetInputFields()
    {
        $this->nome = '';
        $this->users_id = '';
        $this->codigobarra = '';
        $this->categoria_id = '';
        $this->subcategoria_id = '';
        $this->tipo_id = '';
        $this->nome = '';
        $this->icon = '';
        $this->preco = '';
        $this->iva = '';
        $this->desconto = '';
        $this->garantia = '';

        /* $this->idS; */
        $this->edits_nome = '';
        $this->edits_users_id = '';
        $this->edits_codigobarra = '';
        $this->edits_categoria_id = '';
        $this->edits_subcategoria_id = '';
        $this->tipo_id = '';
        $this->edits_icon = '';
        $this->edits_preco = '';
        $this->edits_iva = '';
        $this->edits_desconto = '';
        $this->edits_garantia = '';

        $this->edits_cat_nome = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'codigobarra' => 'required',
            'selectedCategoria' => 'required',
            'subcategoria_id' => 'required',
            'selectedTipo' => 'required',
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preco' => 'required',
            'stockminimo' => 'required',
            'quantidade' => 'required',
            'desconto' => 'required',
            'garantia' => 'required',
            'unidade_id' => 'required',
            'armazem_id' => 'required',
            'iva' => 'required'
        ]);

        $validatedDate['icon'] = $this->icon->store('files', 'public');
        $validatedDate['categoria_id'] = $validatedDate['selectedCategoria'];
        $validatedDate['tipo_id'] = $validatedDate['selectedTipo'];
        $validatedDate['users_id'] = Auth::user()->id;
        $validatedDate['idacesso'] = Auth::user()->idacesso;
        /* dd($validatedDate); */
        $estoque = $validatedDate;
        $artigo = Artigo::create($validatedDate);
        $estoque['artigo_id'] = $artigo->id;
        Stock::create($estoque);
        session()->flash('status', 'Artigo Adicionado!');
        $this->resetInputFields();
    }

    public function storeServico()
    {
        $validatedDate = $this->validate([
            'codigobarra' => 'required',
            'selectedCategoria' => 'required',
            'subcategoria_id' => 'required',
            'selectedTipo' => 'required',
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preco' => 'required',
            /* 'desconto' => 'required',
            'garantia' => 'required',
            'iva' => 'required' */
        ]);
        /*   dd($validatedDate); */

        $validatedDate['icon'] = $this->icon->store('files', 'public');
        $validatedDate['categoria_id'] = $validatedDate['selectedCategoria'];
        $validatedDate['tipo_id'] = $validatedDate['selectedTipo'];
        $validatedDate['users_id'] = Auth::user()->id;
        $validatedDate['idacesso'] = Auth::user()->idacesso;
        $this->selectData = true;
        $this->createData = false;
        $this->updateData = true;

        //Servico
        $this->createServicoData = true;
        $this->updateServicoData = true;
        Artigo::create($validatedDate);
        session()->flash('status', 'Artigo Adicionado!');
        $this->resetInputFields();
    }

    public function storeM()
    {
        dd($this);
        $validatedDate = $this->validate([
            'codigobarra' => 'required',
            'selectedCategoria' => 'required',
            'subcategoria_id' => 'required',
            'selectedTipo' => 'required',
            'nome' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preco' => 'required',
            /* 'desconto' => 'required',
            'garantia' => 'required',
            'iva' => 'required' */
        ]);
        /*   dd($validatedDate); */

        $validatedDate['icon'] = $this->icon->store('files', 'public');
        $validatedDate['categoria_id'] = $validatedDate['selectedCategoria'];
        $validatedDate['tipo_id'] = $validatedDate['selectedTipo'];
        $validatedDate['users_id'] = Auth::user()->id;
        $validatedDate['idacesso'] = Auth::user()->idacesso;

        $this->selectData = true;
        $this->createData = false;
        $this->updateData = true;

        //Servico
        $this->createServicoData = true;
        $this->updateServicoData = true;

        //Matéria
        $this->createMData = true;
        Artigo::create($validatedDate);
        session()->flash('status', 'Artigo Adicionado!');
        $this->resetInputFields();
    }

    public function editS($id)
    {
        $idproduto = '103ee92d-83c2-4ebb-8d88-8edc53e7e1e9';
        $idmateria = '3ce23584-56cc-45ce-853d-84c9965053bf';
        $idservico = '9ed66d9f-614f-4adc-994f-a205099e95a4';
        $servico = Artigo::with('categorias', 'subcategorias', 'tipos', 'stocks')->findOrFail($id);
        /* dd($servico); */
        if ($idmateria === $servico->tipo_id) {
            $this->selectData = false;
            $this->createData = true;
            $this->updateData = true;
            $this->createServicoData = true;
            $this->updateServicoData = true;
            $this->updateMData = false;

            $this->idS = $id;
            $this->users_id = $servico->users_id;
            $this->idacesso = $servico->idacesso;
            $this->editm_nome = $servico->nome;
            $this->editm_codigobarra = $servico->codigobarra;
            $this->editm_categoria_id = $servico->categoria_id;
            $this->editm_subcategoria_id = $servico->subcategoria_id;
            $this->tipo_id = $servico->tipo_id;
            $this->oldm_icon = $servico->icon;
            $this->editm_preco = $servico->preco;
            $this->editm_servico = $servico;
        } elseif ($idservico === $servico->tipo_id) {
            $this->selectData = false;
            $this->createData = true;
            $this->updateData = true;
            $this->createServicoData = true;
            $this->updateServicoData = false;

            $this->idSs = $id;
            $this->users_id = $servico->users_id;
            $this->idacesso = $servico->idacesso;
            $this->edits_nome = $servico->nome;
            $this->edits_codigobarra = $servico->codigobarra;
            $this->edits_categoria_id = $servico->categoria_id;
            $this->edits_subcategoria_id = $servico->subcategoria_id;
            $this->tipo_id = $servico->tipo_id;
            $this->edits_icon = $servico->icon;
            $this->edits_preco = $servico->preco;
            $this->olds_icon = $servico->icon;
            $this->selectedCategoria = $servico->categorias->nome;
            $this->edit_servico = $servico;
        } else {
            $this->selectData = false;
            $this->createData = true;
            $this->updateData = false;
            $this->createServicoData = true;
            $this->updateServicoData = true;
            $this->updateMData = true;

            $this->idP = $id;
            $this->users_id = $servico->users_id;
            $this->idacesso = $servico->idacesso;
            $this->editp_codigobarra = $servico->codigobarra;
            $this->editp_nome = $servico->nome;
            /* $this->editp_stockminimo = $servico->stocks; */
            foreach ($servico->stocks as $e) {
                $this->editp_quantidade = $e->quantidade;
                $this->editp_stockminimo = $e->stockminimo;
                $this->editp_armazem_id = $e->armazem_id;
                $this->editp_unidade_id = $e->unidade_id;
            }
            $this->editp_categoria_id = $servico->categoria_id;
            $this->editp_subcategoria_id = $servico->subcategoria_id;
            $this->editp_tipo_id = $servico->tipos->nome;
            $this->editp_desconto = $servico->desconto;
            $this->editp_garantia = $servico->garantia;
            $this->oldp_icon = $servico->icon;
            $this->editp_preco = $servico->preco;
            $this->editp_servico = $servico;
            /* dd($this->editp_servico->tipos->nome); */
            //Adicional
            $armazem = Armazem::find($this->editp_armazem_id);
            $this->editp_armazem_nome = $armazem->nome;
            $unidade = Unidade::find($this->editp_unidade_id);
            $this->editp_unidade_nome = $unidade->nome;
        }
    }

    public function update()
    {
        /* dd($this); */
        $validatedDate = $this->validate([
            'editp_codigobarra' => 'required',
            'editp_nome' => 'required',
            'editp_preco' => 'required',
            'editp_desconto' => 'required',
            'editp_garantia' => 'required',
            'editp_stockminimo' => 'required',
            'editp_quantidade' => 'required',
        ]);

        $servico = Artigo::findOrFail($this->idP);
        /* dd($servico->id); */
        $destionation = public_path('storage\\' . $servico->icon);

        if (isset($this->newp_icon)) {
            if (File::exists($destionation)) {
                File::delete($destionation);
            }
            $validatedDate['icon'] = $this->newp_icon->store('files', 'public');
        } else {
            $validatedDate['icon'] = $this->oldp_icon;
        }
        /* dd($validatedDate); */
        $validatedDate['nome'] = $this->editp_nome;
        $validatedDate['preco'] = $this->editp_preco;
        $validatedDate['desconto'] = $this->editp_desconto;
        $validatedDate['garantia'] = $this->editp_garantia;
        $validatedDate['stockminimo'] = $this->editp_stockminimo;
        $validatedDate['quantidade'] = $this->editp_quantidade;

        $validatedDate['categoria_id'] = $this->editp_categoria_id;
        $validatedDate['subcategoria_id'] = $this->editp_subcategoria_id;
        $validatedDate['armazem_id'] = $this->editp_armazem_id;
        $validatedDate['unidade_id'] = $this->editp_unidade_id;


        $servico->update($validatedDate);
        Stock::where(['artigo_id' => $servico->id])->update([
            'quantidade' => $this->editp_quantidade,
            'stockminimo' => $this->editp_stockminimo,
            'unidade_id' => $this->editp_unidade_id,
            'armazem_id' => $this->editp_armazem_id
        ]);
        $this->selectData = true;
        $this->createData = false;
        $this->updateData = true;

        //Servico
        $this->createServicoData = true;
        $this->updateServicoData = true;

        //Matéria-prima
        $this->createMData = true;
        $this->updateMData = true;

        session()->flash('status', 'Artigo actualizado com sucesso!');
        $this->resetInputFields();
    }

    public function updateS()
    {
        /* dd($this); */
        $validatedDate = $this->validate([
            'edits_codigobarra' => 'required',
            'edits_nome' => 'required',
            'edits_preco' => 'required',
        ]);

        $servico = Artigo::findOrFail($this->idSs);
        $destionation = public_path('storage\\' . $servico->icon);

        if (isset($this->news_icon)) {
            if (File::exists($destionation)) {
                File::delete($destionation);
            }
            $validatedDate['icon'] = $this->news_icon->store('files', 'public');
        } else {
            $validatedDate['icon'] = $this->olds_icon;
        }

        $validatedDate['codigobarra'] = $this->edits_codigobarra;
        $validatedDate['nome'] = $this->edits_nome;
        $validatedDate['preco'] = $this->edits_preco;
        $validatedDate['categoria_id'] = $this->edits_categoria_id;
        $validatedDate['subcategoria_id'] = $this->edits_subcategoria_id;

        $servico = Artigo::findOrFail($this->idSs);
        $destionation = public_path('storage\\' . $servico->icon);

        if (isset($this->news_icon)) {
            if (File::exists($destionation)) {
                File::delete($destionation);
            }
            $validatedDate['icon'] = $this->news_icon->store('files', 'public');
        } else {
            $validatedDate['icon'] = $this->olds_icon;
        }


        $servico->update($validatedDate);

        $this->selectData = true;
        $this->createData = false;
        $this->updateData = true;

        //Servico
        $this->createServicoData = true;
        $this->updateServicoData = true;

        session()->flash('status', 'Artigo actualizado com sucesso!');
        $this->resetInputFields();
    }

    public function updateM()
    {
        $validatedDate = $this->validate([
            'edits_codigobarra' => 'required',
            'selectedCategoria' => 'required',
            'subcategoria_id' => 'required',
            'edits_nome' => 'required',
            'edits_preco' => 'required',
        ]);
        $materia = Artigo::findOrFail($this->idS);

        $validatedDate['codigobarra'] = $this->edits_codigobarra;
        $validatedDate['categoria_id'] = $this->selectedCategoria;
        $validatedDate['nome'] = $this->edits_nome;

        $destionation = public_path('storage\\' . $materia->icon);
        if (isset($this->new_icon)) {
            if (File::exists($destionation)) {
                File::delete($destionation);
            }
            $validatedDate['icon'] = $this->new_icon->store('files', 'public');
        } else {
            $validatedDate['icon'] = $this->old_icon;
        }
        $validatedDate['preco'] = $this->edits_preco;

        $servico = Artigo::find($this->idS);
        $servico->update($validatedDate);

        $this->selectData = true;
        $this->createData = false;
        $this->updateData = true;

        //Servico
        $this->createServicoData = true;
        $this->updateServicoData = true;
        $this->updateMData = true;


        session()->flash('status', 'Artigo actualizado com sucesso!');
        $this->resetInputFields();
    }


    public function deleteS($id)
    {
        $artigo = Artigo::findOrFail($id);
        if ($artigo->tipo_id === '103ee92d-83c2-4ebb-8d88-8edc53e7e1e9') {
            $estoque = Stock::where('artigo_id', $artigo->id)->first();
            $artigo->delete();
            $estoque->delete();
            session()->flash('status', 'Artigo apagado com sucesso!');
        } else {
            $destionation = public_path('storage\\' . $artigo->icon);
            if (File::exists($destionation)) {
                File::delete($destionation);
            }
            Artigo::find($id)->delete();
            session()->flash('status', 'Artigo apagado com sucesso!');
        }
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }

    public function updatedSelectedCategoriaS($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->subcategoria = Subcategoria::where('categoria_id', $categoria_id)->get();
        }
    }

    public function updatedSelectedTipo($tipo_id)
    {

        $idproduto = '103ee92d-83c2-4ebb-8d88-8edc53e7e1e9';
        $idmateria = '3ce23584-56cc-45ce-853d-84c9965053bf';
        $idservico = '9ed66d9f-614f-4adc-994f-a205099e95a4';
        if (!is_null($tipo_id)) {
            if ($idservico === $tipo_id) {
                $this->selectData = false;
                $this->createData = true;
                $this->updateData = true;
                $this->createServicoData = false;
            } elseif ($idmateria === $tipo_id) {
                $this->selectData = false;
                $this->createData = true;
                $this->updateData = true;
                $this->createServicoData = true;
                $this->createMData = false;
            } elseif ($idproduto === $tipo_id) {
            } else {
            }
        }
    }
}
