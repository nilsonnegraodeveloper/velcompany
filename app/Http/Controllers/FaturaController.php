<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use App\Models\TipagemSala;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    public function __construct(Fatura $fatura)
    {
        $this->fatura = $fatura;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fatura = $this->fatura
            // ->with('clientes')
            // ->with('salas')
            // ->orderBy('faturas.id', 'ASC')
            ->get();

        if ($fatura === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Faturas!'], 404);
        else :
            return response()->json($fatura, 200);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fatura = $this->fatura->find($id)
            // ->with('clientes')
            // ->with('salas')
            ->get();

        if ($fatura === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Fatura!'], 404);
        else :
            return response()->json($fatura, 200);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'sala_tipagem_id' => 'required',
            'tempo' => 'required'
        ]);

        $tipagemSala = TipagemSala::find($request->tipagem_sala_id);
        $valor = ($request->tempo * $tipagemSala->preco) * 60;

        $fatura = $this->fatura->create([
            'cliente_id' => $request->cliente_id,
            'sala_id' => $request->sala_id,
            'tempo' => $request->tempo,
            'valor' => $valor
        ]);

        if ($fatura === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Fatura!'], 404);
        else :
            return response()->json($fatura, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required',
            'sala_id' => 'required',
            'tempo' => 'required'
        ]);

        $fatura = $this->fatura->find($id);
        if ($fatura === null) :
            return response()->json(['erro' => 'Erro a tentar atualizar Fatura!'], 404);
        else :
            $fatura->cliente_id = $request->cliente_id;
            $fatura->sala_id = $request->sala_id;
            $fatura->tempo = $request->tempo;
            $fatura->valor = $request->valor;
            $fatura->update();
            return response()->json($fatura, 200);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $fatura = $this->fatura->find($id);
        if ($fatura === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Fatura!'], 404);
        else :
            $fatura->delete();
            return response()->json(['message' => 'Fatura deletada com Successo!'], 200);
        endif;
    }
}
