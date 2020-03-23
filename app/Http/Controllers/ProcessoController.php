<?php

namespace App\Http\Controllers;

use App\Processo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(Processo::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_unico_processo' => 'required',
            'data_distribuicao' => 'required',
            'reu_principal' => 'required',
            'valor_causa' => 'required',
            'vara' => 'required',
            'comarca' => 'required',
            'estado' => 'required'
        ]);

        $processo = Processo::create($validated);

        return response($processo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response(Processo::find($id), 200);
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
            'numero_unico_processo' => 'required',
            'data_distribuicao' => 'required',
            'reu_principal' => 'required',
            'valor_causa' => 'required',
            'vara' => 'required',
            'comarca' => 'required',
            'estado' => 'required'
        ]);

        $processo = Processo::where('id', $id)->update($validated);

        return response($processo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $processo = Processo::destroy($id);

        return response($processo, 200);
    }
}
