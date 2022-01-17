<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Aumento extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'aumento';
    protected $fillable = ['users_id','idacesso','artigo_id','pagamento_id','unidade_id','materia_id','armazem_id','numerolote','custo','quantidade','validade','estado'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }

    public function pagamentos()
    {
        return $this->hasOne(Pagamento::class, 'id', 'pagamento_id');
    }

    public function unidades()
    {
        return $this->hasOne(Unidade::class, 'id', 'unidade_id');
    }

    public function materias()
    {
        return $this->hasOne(Materia::class, 'id', 'materia_id');
    }

    public function armazems()
    {
        return $this->hasOne(Armazem::class, 'id', 'armazem_id');
    }

    
}
