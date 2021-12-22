<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\Historico;
use App\Models\Models\Subcategoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class Relatorios extends Component
{
    public $user;
    public $relatorios;

    public $search = '';

    public $selectedUser = NULL;

    public function mount()
    {
        $this->user = User::with(['historicos'])->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        $user = Auth::user()->id;
        $relatorio = Historico::with(['itemhistoricos','users'])->get();
        $t = 0;
        foreach($relatorio as $r)
        {
            $t += $r->valortotal;
        }
        $relatorio->valor_total = $t;
        return view('livewire.relatorios', compact('relatorio'));
    }

    public function updatedSelectedUser($users_id)
    {
        if (!is_null($users_id)){
            $this->relatorios = Historico::where('users_id', $users_id)
                                            ->with(['itemhistoricos','users'])->get();
        }
    }
}
