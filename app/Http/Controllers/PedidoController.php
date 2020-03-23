<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($processoId)
    {
        return response(Pedido::where('processo_id', $processoId)->with('tipoPedido')->get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, $processoId)
    {
        $validated = $request->validate([
            'tipo_pedido_id' => 'required',
            'valor_risco_provavel' => 'required',
            'status' => 'required'
        ]);

        $validated['processo_id'] = $processoId;

        $pedido = Pedido::create($validated);

        return response($pedido, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response(Pedido::where('id' ,$id)->with('tipoPedido')->first(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tipo_pedido_id' => 'required',
            'valor_risco_provavel' => 'required',
            'status' => 'required'
        ]);

        $pedido = Pedido::where('id', $id)->update($validated);

        return response($pedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $processo = Pedido::destroy($id);

        return response($processo, 200);
    }
}
