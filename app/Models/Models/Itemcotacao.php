<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Itemcotacao extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'itemcotacao';
    protected $fillable = ['cotacao_id','artigo_id','designacao','quantidade'];

    public function cotacaos()
    {
        return $this->hasOne(Cotacao::class, 'id', 'cotacao_id');
    }

    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }
}
