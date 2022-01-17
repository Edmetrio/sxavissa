<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Composicao extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'composicao';
    protected $fillable = ['artigo_id','materia_id','unidade_id','users_id','idacesso','quantidade','estado'];

    public function artigos()
    {
        return $this->hasOne(Artigo::class, 'id', 'artigo_id');
    }

    public function materias()
    {
        return $this->hasOne(Materia::class, 'id', 'materia_id');
    }

    public function unidades()
    {
        return $this->hasOne(Unidade::class, 'id', 'unidade_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'materia_id');
    }
}
