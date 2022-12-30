<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipagemSala extends Model
{
    use HasFactory;

    protected $fillable =
    [   
        'sala_id',
        'tipo_sala_id',
        'preco'
    ]; 
    
    public function tiposSalas()
    {
        return $this->belongsToMany('\App\Models\TipoSala');
    } 

    public function salas()
    {
        return $this->belongsToMany('\App\Models\Sala');
    }
}
