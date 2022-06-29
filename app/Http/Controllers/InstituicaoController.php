<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instituicao;
use App\Http\Requests\InstituicaoRequest;

class InstituicaoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$instituicoes = Instituicao::orderBy('nome')->paginate(5);
            return view('instituicao.index', ['instituicao'=>$instituicoes]);
        }
        else
            $instituicoes = Instituicao::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
                            ->setpath('instituicao?desc_filtro='.$filtragem);
		return view('instituicao.index', ['instituicao'=>$instituicoes]);
	}

    public function create() {
        return view('instituicao.create');
    }

    public function store(InstituicaoRequest $request) {
        $nova_instituicao = $request->all();
        Instituicao::create($nova_instituicao);
        return redirect()->route('instituicao');
    }

    public function destroy($id) {
        try{
            Instituicao::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $instituicao = Instituicao::find(\Crypt::decrypt($request->get('id')));
        return view('instituicao.edit', compact('instituicao'));
     }

    public function update(InstituicaoRequest $request, $id) {
        Instituicao::find($id)->update($request->all());
       return redirect()->route('instituicao');
    }
}
