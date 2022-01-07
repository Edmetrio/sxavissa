<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Materia extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'materia';
    protected $fillable = ['subcategoria_id','nome','preco','estado'];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'materia_id');
    }

    public function armazems()
    {
        return $this->hasOneThrough(Armazem::class, Stock::class);
    }

    public function artigos()
    {
        return $this->belongsToMany(Artigo::class);
    }
}
