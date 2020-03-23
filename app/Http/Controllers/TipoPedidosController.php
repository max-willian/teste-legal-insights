<?php

namespace App\Http\Controllers;

use App\TipoPedido;
use Illuminate\Http\Request;

class TipoPedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(TipoPedido::all(), 200);
    }
}
