<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Cotacao extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'cotacao';
    protected $fillable = ['users_id','idacesso','titulo_id','nome','endereco','telefone','nuit','valortotal','estado'];

    public function titulos()
    {
        return $this->hasOne(Titulo::class, 'id', 'titulo_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function itemcotacao()
    {
        return $this->hasMany(Itemcotacao::class, 'cotacao_id');
    }

    public function itemartigo()
    {
        return $this->belongsToMany(Artigo::class, 'itemcotacao');
    }
}
