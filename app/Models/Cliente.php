<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =
    [        
        'razao_social',
        'nome_fantasia',
        'cpf_cnpj',
        'telefone',
        'email',
        'data_nascimento',
        'cep',
        'logradouro',
        'complemento',
        'numero',
        'cidade',
        'uf'
    ]; 

    public function faturas()
    {
        return $this->hasMany('\App\Models\Fatura');
    }
}
