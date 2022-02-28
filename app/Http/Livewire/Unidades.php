<?php

namespace App\Http\Livewire;

use App\Models\Models\Unidade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Unidades extends Component
{
    public $selectData = true;
    public $createData = false;
    public $updateData = false;

    public $nome;
    
    public $ids;
    public $edit_nome;
    public $total_Unidade;

    /* public $unidades, $unidade_id, $users_id, $idacesso, $nome, $estado;
    public $updateMode = false; */

    use WithPagination;
    public function render()
    {
        $this->total_Unidade = Unidade::get();
        $this->unidades= Unidade::orderBy('created_at', 'desc')->get();
        return view('livewire.unidades');
    }

    private function resetInputFields()
    {
        $this->nome = '';

        $this->ids;
        $this->edit_nome;
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
        ]);

        $validatedDate['users_id'] = Auth::user()->id;
        $validatedDate['idacesso'] = Auth::user()->idacesso;
        Unidade::create($validatedDate);
        session()->flash('status', 'Unidade criada com sucesso!');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        /* dd('Estoque'); */
        $this->selectData = false;
        $this->updateData = true;
        $this->createData = true;

        $unidade = Unidade::findOrFail($id);
        $this->ids = $id;
        $this->users_id = $unidade->users_id;
        $this->idacesso = $unidade->idacesso;
        $this->edit_nome = $unidade->nome;

        /* $this->updateMode = true; */
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'edit_nome' => 'required',
        ]);

        $unidade = Unidade::find($this->ids);
        $unidade->update([
            'nome' => $this->edit_nome,
        ]);

        $this->selectData = true;
        $this->updateData = false;
        $this->createData = false;
        session()->flash('status', 'Unidade actualizada com sucesso!');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Unidade::find($id)->delete();
        session()->flash('status', 'Unidade apagada com sucesso!');
    }
}
