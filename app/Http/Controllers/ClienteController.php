<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cliente = $this->cliente->get();

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Clientes!'], 404);
        else :
            return response()->json($cliente, 200);
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
        
        $cliente = $this->cliente->find($id);

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Cliente!'], 404);
        else :
            return response()->json($cliente, 200);
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
            'razao_social' => 'required',
            'cpf_cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'uf' => 'required'
        ]);

        $cliente = $this->cliente->create([            
            'razao_social' => $request->razao_social,
            'nome_fantasia' => $request->nome_fantasia,
            'cpf_cnpj' => $request->cpf_cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'complemento' => $request->complemento,
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'uf' => $request->uf
        ]);

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Cliente!'], 404);
        else :
            return response()->json($cliente, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'razao_social' => 'required',
            'cpf_cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'uf' => 'required'
        ]);
        $cliente = $this->cliente->find($id);
        if ($cliente === null) :
            return response()->json(['erro' => 'Erro a tentar atualizar Cliente!'], 404);
        else :
            $cliente->razao_social = $request->razao_social;
            $cliente->nome_fantasia = $request->nome_fantasia;
            $cliente->cpf_cnpj = $request->cpf_cnpj;
            $cliente->telefone = $request->telefone;
            $cliente->email = $request->email;
            $cliente->data_nascimento = $request->data_nascimento;
            $cliente->cep = $request->cep;
            $cliente->logradouro = $request->logradouro;
            $cliente->complemento = $request->complemento;
            $cliente->numero = $request->numero;
            $cliente->cidade = $request->cidade;
            $cliente->uf = $request->uf;
            $cliente->update();
            return response()->json($cliente, 200);
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
        $cliente = $this->cliente->find($id);
        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Cliente!'], 404);
        else :
            $cliente->delete();
            return response()->json(['message' => 'Cliente deletado com Successo!'], 200);
        endif;
    }
}
