<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;

    protected $fillable =
    [   
        'nome',        
        'cep',
        'logradouro',
        'complemento',
        'numero',
        'cidade',
        'uf',
        'url_google_maps',
        'fotos',
        'descricao'
    ]; 

    public function salas()
    {
        return $this->hasMany('\App\Models\Sala');
    }
}
