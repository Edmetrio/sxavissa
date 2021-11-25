<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Telefone extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'telefone';
    protected $fillable = ['users_id','operadora_id','numero','estado'];

    public function operadoras()
    {
        return $this->hasOne(Operadora::class, 'id', 'operadora_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
}
