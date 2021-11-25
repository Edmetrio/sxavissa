<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;


class Stock extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
    /* protected $primaryKey = 'artigo_id'; */

    protected $table = 'stock';
    protected $fillable = ['users_id','artigo_id','unidade_id','armazem_id','custo','quantidade','stockminimo','estado'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }

    public function unidades()
    {
        return $this->hasOne(Unidade::class, 'id', 'unidade_id');
    }

    public function armazens()
    {
        return $this->hasOne(Armazem::class, 'id', 'armazem_id');
    }
}
