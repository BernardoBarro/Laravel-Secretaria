<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Http\Requests\ProjetoRequest;

class ProjetoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$projetos = \DB::table('projeto')
	            ->select('projeto.*', 'nome')
	            ->paginate(10);
        }
        else
            $projetos = Projeto::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(10)
                            ->setpath('atores?desc_filtro='.$filtragem);
		return view('projeto.index', ['projeto'=>$projetos]);
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
