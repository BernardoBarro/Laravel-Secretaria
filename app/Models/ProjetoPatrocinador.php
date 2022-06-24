<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoPatrocinador extends Model
{
    use HasFactory;
    protected $table = "projeto_patrocinadores";
    protected $fillable = ['projeto_id', 'patrocinador_id'];

    public function patrocinador() {
        return $this->belongsTo("App\Models\Patrocinador");
    }
}
