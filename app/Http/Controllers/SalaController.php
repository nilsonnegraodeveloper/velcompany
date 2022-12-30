<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{

    public function __construct(Sala $sala)
    {
        $this->sala = $sala;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sala = $this->sala->get();

        if ($sala === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Salas!'], 404);
        else :
            return response()->json($sala, 200);
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
        $sala = $this->sala->find($id)->get();

        if ($sala === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Sala!'], 404);
        else :
            return response()->json($sala, 200);
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
            'tipo_sala_id' => 'required',
            'nome' => 'required',
            'fotos' => 'required',
            'descricao' => 'required'
        ]);

        $sala = $this->sala->create([
            'tipo_sala_id' => $request->tipo_sala_id,
            'nome' => $request->nome,
            'fotos' => $request->fotos,
            'descricao' => $request->descricao
        ]);

        if ($sala === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Sala!'], 404);
        else :
            return response()->json($sala, 200);
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
            'tipo_sala_id' => 'required',
            'nome' => 'required',
            'fotos' => 'required',
            'descricao' => 'required'
        ]);

        $sala = $this->sala->find($id);
        if ($sala === null) :
            return response()->json(['erro' => 'Erro a tentar atualizar Sala!'], 404);
        else :
            $sala->tipo_sala_id = $request->tipo_sala_id;
            $sala->nome = $request->nome;
            $sala->fotos = $request->fotos;
            $sala->descricao = $request->descricao;
            $sala->update();
            return response()->json($sala, 200);
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
        $sala = $this->sala->find($id);
        if ($sala === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Sala!'], 404);
        else :
            $sala->delete();
            return response()->json(['message' => 'Sala deletada com Successo!'], 200);
        endif;
    }
}
