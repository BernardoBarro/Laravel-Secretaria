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
    		$reuinaos = \DB::table('reuniao')
	            ->select('reuniao.*', 'nome')
	            ->paginate(10);
        }
        else
            $reuinaos = Reuniao::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(10)
                            ->setpath('reuniao?desc_filtro='.$filtragem);
		return view('reuniao.index', ['reuniao'=>$reuinaos]);
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
        Reuniao::find($id)->delete();
        return redirect()->route('reuniao');
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
