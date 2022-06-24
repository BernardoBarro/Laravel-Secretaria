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
        return $this->hasMany("App\Models\ProjetoInstituicao");
    }

    public function patrocinadores() {
        return $this->hasMany("App\Models\ProjetoPatrocinador");
    }
}
