<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Perfil extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'perfil';
    protected $fillable = ['users_id','nuit','nome','icon'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'perfil_id');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'perfil_id');
    }

    public function armazems()
    {
        return $this->hasMany(Armazem::class, 'armazem_id');
    }
}
