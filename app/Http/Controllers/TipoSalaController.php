<?php

namespace App\Http\Controllers;

use App\Models\TipoSala;
use Illuminate\Http\Request;

class TipoSalaController extends Controller
{
    
    public function __construct(TipoSala $tipoSala)
    {
        $this->tipoSala = $tipoSala;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tipoSala = $this->tipoSala->get();

        if ($tipoSala === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Tipos de Salas!'], 404);
        else :
            return response()->json($tipoSala, 200);
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
       $tipoSala = $this->tipoSala->find($id); 
        if ($tipoSala === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Tipo de Sala!'], 404);
        else :
            return response()->json($tipoSala, 200);
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
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required'
        ]); 

        $tipoSala = $this->tipoSala->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco
        ]);

        if ($tipoSala === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Tipo de Sala!'], 404);
        else :
            return response()->json($tipoSala, 200);
        endif;
    }
    
    /**
     * Update the specified resource in storage.
     * @param Integer
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required'
        ]); 

        $tipoSala = $this->tipoSala->find($id);
        if ($tipoSala === null) :
            return response()->json(['erro' => 'Erro a tentar atualizar Tipo de Sala!'], 404);
        else :
            $tipoSala->nome = $request->nome;
            $tipoSala->descricao = $request->descricao;
            $tipoSala->preco = $request->preco;
            $tipoSala->update();
            return response()->json($tipoSala, 200);
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
        $tipoSala = $this->tipoSala->find($id);
        if ($tipoSala === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Tipo de Sala'], 404);
        else :
            $tipoSala->delete();
            return response()->json(['message' => 'Tipo de Sala deletada com Successo!'], 200);
        endif;
    }
}
