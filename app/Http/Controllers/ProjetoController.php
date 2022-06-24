<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Http\Requests\ProjetoRequest;

class ProjetoController extends Controller
{
    public function index(){
        $projeto = Projeto::All();
        return view('projeto.index',['projetos' =>$projeto]);
    }

    public function create() {
        return view('projeto.create');
    }

    public function store(projetoRequest $request) {
        $novo_projeto = $request->all();
        Projeto::create($novo_projeto);
        return redirect()->route('projeto');
    }

    public function destroy($id) {
        Projeto::find($id)->delete();
        return redirect()->route('projeto');
    }

    public function edit(Request $request) {
       $projeto = Projeto::find(\Crypt::decrypt($request->get('id')));
       return view('projeto.edit', compact('projeto'));
    }

    public function update(ProjetoRequest $request, $id) {
        Projeto::find($id)->update($request->all());
       return redirect()->route('projeto');
    }
}
