<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjetoInstituicao;
use App\Models\ProjetoPatrocinador;
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

    public function store(Request $request) {
        $projeto = Projeto::create([
            'nome' => $request->get('nome'),
            'descricao' => $request->get('descricao')
        ]);
        $instituicoes = $request->instituicoes;
        foreach($instituicoes as $i => $value) {
            ProjetoInstituicao::create([
                'projeto_id' => $projeto->id,
                'instituicao_id' => $instituicoes[$i]
            ]);
        }
        $patrocinadores = $request->patrocinadores;
        foreach($patrocinadores as $p => $value) {
            ProjetoPatrocinador::create([
                'projeto_id' => $projeto->id,
                'patrocinador_id' => $patrocinadores[$p]
            ]);
        }
        return redirect()->route('projeto');
    }
    
    public function destroy($id) {
        Projeto::find($id)->delete();
        return redirect()->route('projeto');
    }

    public function edit($id) {
       $projeto = Projeto::find($id);
       return view('projeto.edit', compact('projeto'));
    }

    public function update(ProjetoRequest $request, $id) {
        Projeto::find($id)->update($request->all());
       return redirect()->route('projeto');
    }
}
