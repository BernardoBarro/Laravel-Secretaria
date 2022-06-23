<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convidado;
use App\Http\Requests\ConvidadoRequest;

class ConvidadoController extends Controller
{
    public function index(){
        $convidado = Convidado::All();
        return view('convidado.index',['convidados' =>$convidado]);
    }

    public function create() {
        return view('convidado.create');
    }

    public function store(ConvidadoRequest $request) {
        $novo_convidado = $request->all();
        Convidado::create($novo_convidado);
        return redirect()->route('convidado');
    }

    public function destroy($id) {
        Convidado::find($id)->delete();
        return redirect()->route('convidado');
    }

    public function edit(Request $request) {
        $convidado = Convidado::find(\Crypt::decrypt($request->get('id')));
        return view('convidado.edit', compact('convidado'));
    }

    public function update(ConvidadoRequest $request, $id) {
       Convidado::find($id)->update($request->all());
       return redirect()->route('convidado');
    }
}
