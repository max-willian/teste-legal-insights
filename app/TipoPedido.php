<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPedido extends Model
{
    protected $fillable = [
        'nome'
    ];

    public $timestamps = false;
}
