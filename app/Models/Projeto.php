<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;
    protected $fillable =['nome', 'data_inicio', 'titulo', 'sla', 'categoria_id', 'situacao_id'];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'categoria_id', 'id');
    }

    public function situacao(){
        return $this->belongsTo('App\Models\Situacao', 'situacao_id', 'id');
    }
}
