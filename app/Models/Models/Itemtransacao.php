<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Itemtransacao extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'itemtransacao';
    protected $fillable = ['transacao_id','artigo_id','quantidade','preco','iva','desconto','subtotal','estado'];

    public function transacaos()
    {
        return $this->hasOne(transacao::class, 'id', 'transacao_id');
    }

    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }    
}
