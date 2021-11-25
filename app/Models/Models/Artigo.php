<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Artigo extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'artigo';
    protected $fillable = ['codigobarra','categoria_id','subcategoria_id','tipo_id','nome','icon','preco','iva','desconto','garantia','estado'];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'artigo_id');
    }

    public function categorias()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function subcategorias()
    {
        return $this->hasOne(Subcategoria::class, 'id', 'subcategoria_id');
    }

    public function tipos()
    {
        return $this->hasOne(Tipo::class, 'id', 'tipo_id');
    }
}
