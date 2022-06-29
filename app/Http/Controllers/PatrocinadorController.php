<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrocinador;
use App\Http\Requests\PatrocinadorRequest;

class PatrocinadorController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$patrocinadores = Patrocinador::orderBy('nome')->paginate(5);
            return view('patrocinador.index', ['patrocinador'=>$patrocinadores]);
        }
        else
            $patrocinadores = Patrocinador::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
                            ->setpath('patrocinador?desc_filtro='.$filtragem);
		return view('patrocinador.index', ['patrocinador'=>$patrocinadores]);
	}

    public function create() {
        return view('patrocinador.create');
    }

    public function store(PatrocinadorRequest $request) {
        $novo_patrocinador = $request->all();
        Patrocinador::create($novo_patrocinador);
        return redirect()->route('patrocinador');
    }

    public function destroy($id) {
        try{
            Patrocinador::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $patrocinador = Patrocinador::find(\Crypt::decrypt($request->get('id')));
        return view('patrocinador.edit', compact('patrocinador'));
     }

    public function update(PatrocinadorRequest $request, $id) {
        Patrocinador::find($id)->update($request->all());
       return redirect()->route('patrocinador');
    }
}
