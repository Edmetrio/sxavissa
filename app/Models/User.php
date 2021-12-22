<?php

namespace App\Models;

use App\Models\Models\Armazem;
use App\Models\Models\Endereco;
use App\Models\Models\Historico;
use App\Models\Models\Perfil;
use App\Models\Models\Stock;
use App\Models\Models\Telefone;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perfils()
    {
        return $this->hasMany(Perfil::class, 'users_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'users_id');
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'users_id');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'users_id');
    }

    public function armazems()
    {
        return $this->hasMany(Armazem::class, 'users_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class, 'users_id');
    }
}