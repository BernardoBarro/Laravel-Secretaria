<?php

namespace App\Http\Controllers;
use App\Models\Associado;

use Illuminate\Http\Request;

class AssociadoController extends Controller
{
    public function index(){
        $associados = Associado::All();
        return view('associado',['associados' =>$associados]);
    }
}
