<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Historico extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'historico';
    protected $fillable = ['users_id','userscli_id','pagamento_id','tipotransacao_id','validade','datapagamento','banco','caixa','subtotal','iva','desconto','valortotal','valorpago','valordevido','estado'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function pagamentos()
    {
        return $this->hasOne(Pagamento::class, 'id', 'pagamento_id');
    }

    public function tipotransacaos()
    {
        return $this->hasOne(Tipotransacao::class, 'id', 'tipotransacao_id');
    }
}
