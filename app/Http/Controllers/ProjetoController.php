<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjetoInstituicao;
use App\Models\ProjetoPatrocinador;
use App\Models\Projeto;
use App\Http\Requests\ProjetoRequest;

class ProjetoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$projetos = Projeto::orderBy('nome')->paginate(5);
            return view('projeto.index', ['projeto'=>$projetos]);
        }
        else
            $projetos = Projeto::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
                            ->setpath('projeto?desc_filtro='.$filtragem);
		return view('projeto.index', ['projeto'=>$projetos]);
	}

    public function create() {
        return view('projeto.create');
    }

    public function store(Request $request) {
        $projeto = Projeto::create($request->all());
        $projeto->instituicoes()->sync($request->get('instituicoes'));
        $projeto->patrocinadores()->sync($request->get('patrocinadores'));
        return redirect()->route('projeto');
    }
    
    public function destroy($id) {
        try{
            Projeto::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
       $projeto = Projeto::find(\Crypt::decrypt($request->get('id')));
       return view('projeto.edit', compact('projeto'));
    }

    public function update(ProjetoRequest $request, $id) {
        $projeto = Projeto::find($id);
        $projeto->update($request->all());
        $projeto->instituicoes()->sync($request->get('instituicoes'));
        $projeto->patrocinadores()->sync($request->get('patrocinadores'));
       return redirect()->route('projeto');
    }
}
