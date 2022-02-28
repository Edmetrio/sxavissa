<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Itemhistorico extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'itemhistorico';
    protected $fillable = ['idacesso','users_id','historico_id','artigo_id','quantidade','preco','iva','desconto','subtotal','estado'];

    public function historicos()
    {
        return $this->hasOne(Historico::class, 'id', 'historico_id');
    }

    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

}
