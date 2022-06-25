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
    		$patrocinadores = \DB::table('patrocinador')
	            ->select('patrocinador.*', 'nome')
	            ->paginate(10);
        }
        else
            $patrocinadores = Patrocinador::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(10)
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
        Patrocinador::find($id)->delete();
        return redirect()->route('patrocinador');
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
