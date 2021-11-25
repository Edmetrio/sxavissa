<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class aumento extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'aumento';
    protected $fillable = ['artigo_id','unidade_id','transacao_id','numerolote','custo','quantidade','validade','estado'];

    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }

    public function unidades()
    {
        return $this->hasOne(Unidade::class, 'id', 'unidade_id');
    }

    public function transacaos()
    {
        return $this->hasOne(transacao::class, 'id', 'transacao_id');
    }
}
