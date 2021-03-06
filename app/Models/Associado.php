<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;
    protected $table = "associados";
    protected $fillable = ['nome', 'dt_nascimento', 'email', 'dt_admissao', 'cargo_id', 'endereco_id'];

    public function cargo() {
        return $this->belongsTo("App\Models\Cargo");
    }

    public function endereco() {
        return $this->belongsTo("App\Models\Endereco");
    }
}
