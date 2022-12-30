<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;
    protected $fillable =
    [        
        'cliente_id',
        'tipagem_sala_id',        
        'tempo',
        'valor'
    ]; 

    public function cliente()
    {
        return $this->belongsTo('\App\Models\Cliente');
    }

    public function sala()
    {
        return $this->belongsTo('\App\Models\Sala');
    }
}
