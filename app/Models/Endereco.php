<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = "endereco";
    protected $fillable = ['cep', 'cidade', 'bairro', 'rua'];

    public function associado(){
        return $this->hasOne("App\Models\Associado");
    }
}
