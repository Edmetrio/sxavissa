<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;


class Itempagamento extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'itempagamento';
    protected $fillable = ['transacao_id','pagamento_id','quantidade','estado'];

    public function transacaos()
    {
        return $this->hasOne(Transacao::class, 'id', 'transacao_id');
    }

    public function pagamentos()
    {
        return $this->hasOne(Pagamento::class, 'id', 'pagamento_id');
    }
}
