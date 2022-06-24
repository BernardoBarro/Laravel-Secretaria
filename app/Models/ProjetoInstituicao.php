<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoInstituicao extends Model
{
    use HasFactory;
    protected $table = "projeto_instituicoes";
    protected $fillable = ['projeto_id', 'instituicao_id'];

    public function instituicao() {
        return $this->belongsTo("App\Models\Instituicao");
    }
}
