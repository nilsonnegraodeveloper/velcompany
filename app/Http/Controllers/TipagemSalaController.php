<?php

namespace App\Http\Controllers;

use App\Models\TipagemSala;
use Illuminate\Http\Request;

class TipagemSalaController extends Controller
{
    public function __construct(TipagemSala $tipagemSala)
    {
        $this->tipagemSala = $tipagemSala;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tipagemSala = $this->tipagemSala->get();

        if ($tipagemSala === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Tipagem de Salas!'], 404);
        else :
            return response()->json($tipagemSala, 200);
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
        
        $tipagemSala = $this->tipagemSala->find($id);

        if ($tipagemSala === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Tipagem de Sala!'], 404);
        else :
            return response()->json($tipagemSala, 200);
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
            'sala_id' => 'required',
            'tipo_sala_id' => 'required',
            'preco' => 'required'
        ]);

        $tipagemSala = $this->tipagemSala->create([            
            'sala_id' => $request->sala_id,
            'tipo_sala_id' => $request->tipo_sala_id,
            'preco' => $request->preco
        ]);

        if ($tipagemSala === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Tipagem de Sala!'], 404);
        else :
            return response()->json($tipagemSala, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipagemSala  $tipagemSala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sala_id' => 'required',
            'tipo_sala_id' => 'required',
            'preco' => 'required'
        ]);
        $tipagemSala = $this->tipagemSala->find($id);
        if ($tipagemSala === null) :
            return response()->json(['erro' => 'Erro a tentar atualizar Tipagem de Sala!'], 404);
        else :
            $tipagemSala->sala_id = $request->sala_id;
            $tipagemSala->tipo_sala_id = $request->tipo_sala_id;
            $tipagemSala->preco = $request->preco;
            $tipagemSala->update();
            return response()->json($tipagemSala, 200);
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
        $tipagemSala = $this->tipagemSala->find($id);
        if ($tipagemSala === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Tipagem de Sala!'], 404);
        else :
            $tipagemSala->delete();
            return response()->json(['message' => 'Tipagem de Sala deletado com Successo!'], 200);
        endif;
    }
}
