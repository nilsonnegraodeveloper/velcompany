<?php

namespace App\Http\Controllers;

use App\Models\Predio;
use Illuminate\Http\Request;

class PredioController extends Controller
{

    public function __construct(Predio $predio)
    {
        $this->predio = $predio;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $predio = $this->predio->get();

        if ($predio === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Prédios!'], 404);
        else :
            return response()->json($predio, 200);
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
        $predio = $this->predio->find($id)->get();            

        if ($predio === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Prédio!'], 404);
        else :
            return response()->json($predio, 200);
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
            'nome' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'fotos' => 'required',
            'descricao' => 'required'
        ]);

        $predio = $this->predio->create([  
            'sala_id' => $request->sala_id,           
            'nome' => $request->nome,            
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'complemento' => $request->complemento,
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'url_google_maps' => $request->url_google_maps,
            'fotos' => $request->fotos,
            'descricao' => $request->descricao
        ]);

        if ($predio === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Prédio!'], 404);
        else :
            return response()->json($predio, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sala_id' => 'required',
            'nome' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'fotos' => 'required',
            'descricao' => 'required'
        ]);
        $predio = $this->predio->find($id);
        if ($predio === null) :
            return response()->json(['erro' => 'Erro a tentar atualizar Prédio!'], 404);
        else :
            $predio->sala_id = $request->sala_id;
            $predio->nome = $request->nome;            
            $predio->cep = $request->cep;
            $predio->logradouro = $request->logradouro;
            $predio->complemento = $request->complemento;
            $predio->numero = $request->numero;
            $predio->cidade = $request->cidade;
            $predio->uf = $request->uf;
            $predio->fotos = $request->fotos;
            $predio->descricao = $request->descricao;
            $predio->update();
            return response()->json($predio, 200);
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
        $predio = $this->predio->find($id);
        if ($predio === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Prédio!'], 404);
        else :
            $predio->delete();
            return response()->json(['message' => 'Prédio deletado com Successo!'], 200);
        endif;
    }
}
