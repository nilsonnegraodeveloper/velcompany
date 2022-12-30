<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable =
    [   
        'predio_id',
        'tipo_sala_id',
        'nome',
        'fotos',
        'descricao'
    ]; 
    
    public function tiposSalas()
    {
        return $this->hasMany('\App\Models\TipoSala');
    }    

    public function predio()
    {
        return $this->belongsTo('\App\Models\Predio');
    }

    public function tipagemSalas()
    {
        return $this->belongsToMany('\App\Models\TipagemSalas');
    }    
}
