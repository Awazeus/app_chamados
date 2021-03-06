<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;
    protected $fillable =['titulo', 'sla_id', 'categoria_id', 'situacao_id', 'projeto_id'];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'categoria_id', 'id');
    }

    public function situacao(){
        return $this->belongsTo('App\Models\Situacao', 'situacao_id', 'id');
    }

    public function projeto(){
        return $this->belongsTo('App\Models\Projeto', 'projeto_id', 'id');
    }

    public function sla(){
        return $this->belongsTo('App\Models\SLA', 'sla_id', 'id');
    }
}
