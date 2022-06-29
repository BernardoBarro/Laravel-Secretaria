<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convidado;
use App\Http\Requests\ConvidadoRequest;

class ConvidadoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$convidados = Convidado::orderBy('nome')->paginate(5);
            return view('convidado.index', ['convidado'=>$convidados]);
        }
        else
            $convidados = Convidado::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
                            ->setpath('convidado?desc_filtro='.$filtragem);
		return view('convidado.index', ['convidado'=>$convidados]);
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
        try{
            Convidado::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
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
