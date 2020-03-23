<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validate)
 * @method static find(int $id)
 * @method static where(string $string, int $id)
 */
class Processo extends Model
{
    protected $fillable = [
        'numero_unico_processo',
        'data_distribuicao',
        'reu_principal',
        'valor_causa',
        'vara',
        'comarca',
        'estado'
    ];

    public $timestamps = false;
}
