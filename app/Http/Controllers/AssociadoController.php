<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associado;
use App\Http\Requests\AssociadoRequest;

class AssociadoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$associados = Associado::orderBy('nome')->paginate(5);
            return view('associado.index', ['associado'=>$associados]);
        }
        else
            $associados = Associado::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
                            ->setpath('associado?desc_filtro='.$filtragem);
		return view('associado.index', ['associado'=>$associados]);
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
        try{
            Associado::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $associado = Associado::find(\Crypt::decrypt($request->get('id')));
        return view('associado.edit', compact('associado'));
    }

    public function update(AssociadoRequest $request, $id) {
       Associado::find($id)->update($request->all());
       return redirect()->route('associado');
    }
}
