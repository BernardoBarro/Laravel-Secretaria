<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'genero', 'ocupacao', 'dt_nascimento', 'email', 'dt_admissao', 'telefone', 'padrinho', 'cargo'];
}
