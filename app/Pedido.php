<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $pedidoId)
 * @method static create(array $validated)
 * @method static find(int $id)
 */
class Pedido extends Model
{
    protected $fillable = [
        'processo_id',
        'tipo_pedido_id',
        'valor_risco_provavel',
        'status'
    ];

    public $timestamps = false;

    public function tipoPedido(){
        return $this->belongsTo(TipoPedido::class);
    }
}
