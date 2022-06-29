<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;
    protected $table = "projeto";
    protected $fillable = ['nome', 'descricao'];

    public function instituicoes() {
        return $this->belongsToMany("App\Models\Instituicao", "projeto_instituicoes");
    }
    
    public function patrocinadores() {
        return $this->belongsToMany("App\Models\Patrocinador", "projeto_patrocinadores");
    }
}
