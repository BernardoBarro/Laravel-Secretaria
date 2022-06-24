<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Http\Requests\CargoRequest;

class CargoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$cargos = \DB::table('cargo')
	            ->select('cargo.*', 'nome')
	            ->paginate(10);
        }
        else
            $cargos = Cargo::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(10)
                            ->setpath('cargo?desc_filtro='.$filtragem);
		return view('cargo.index', ['cargo'=>$cargos]);
	}

    public function create() {
        return view('cargo.create');
    }

    public function store(CargoRequest $request) {
        $novo_cargo = $request->all();
        Cargo::create($novo_cargo);
        return redirect()->route('cargo');
    }

    public function destroy($id) {
        Cargo::find($id)->delete();
        return redirect()->route('cargo');
    }

    public function edit(Request $request) {
        $cargo = Cargo::find(\Crypt::decrypt($request->get('id')));
        return view('cargo.edit', compact('cargo'));
    }

    public function update(CargoRequest $request, $id) {
       Cargo::find($id)->update($request->all());
       return redirect()->route('cargo');
    }
}
