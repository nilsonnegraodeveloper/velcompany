<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSala extends Model
{
    use HasFactory;

    protected $fillable =
    [    
        'nome',        
        'descricao',
        'preco'
    ]; 

    public function sala()
    {
        return $this->belongsTo('\App\Models\Sala');
    }
}
