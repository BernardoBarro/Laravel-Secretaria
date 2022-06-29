<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reuniao;
use App\Http\Requests\ReuniaoRequest;

class ReuniaoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$reunioes = Reuniao::orderBy('nome')->paginate(5);
            return view('reuniao.index', ['reuniao'=>$reunioes]);
        }
        else
            $reunioes = Reuniao::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
                            ->setpath('reuniao?desc_filtro='.$filtragem);
		return view('reuniao.index', ['reuniao'=>$reunioes]);
	}

    public function create() {
        return view('reuniao.create');
    }

    public function store(ReuniaoRequest $request) {
        $novo_reuniao = $request->all();
        Reuniao::create($novo_reuniao);
        return redirect()->route('reuniao');
    }

    public function destroy($id) {
        try{
            Reuniao::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $reuniao = Reuniao::find(\Crypt::decrypt($request->get('id')));
        return view('reuniao.edit', compact('reuniao'));
     }

    public function update(ReuniaoRequest $request, $id) {
       Reuniao::find($id)->update($request->all());
       return redirect()->route('reuniao');
    }
}
