<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associado;
use App\Http\Requests\AssociadoRequest;

class AssociadoController extends Controller
{
    public function index(){
        $associados = Associado::All();
        return view('associado.index',['associados' =>$associados]);
    }

    public function create() {
        return view('associado.create');
    }

    public function store(AssociadoRequest $request) {
        $novo_associado = $request->all();
        Associado::create($novo_associado);
        return redirect()->route('associado');
    }

    public function destroy($id) {
        Associado::find($id)->delete();
        return redirect()->route('associado');
    }

    public function edit($id) {
       $associado = Associado::find($id);
       return view('associado.edit', compact('associado'));
    }

    public function update(AssociadoRequest $request, $id) {
       Associado::find($id)->update($request->all());
       return redirect()->route('associado');
    }
}
