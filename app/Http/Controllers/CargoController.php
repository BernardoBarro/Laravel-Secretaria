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
    		$cargos = Cargo::orderBy('nome')->paginate(5);
            return view('cargo.index', ['cargo'=>$cargos]);
        }
        else
            $cargos = Cargo::where('nome', 'like', '%'.$filtragem.'%')
        					->orderBy("nome")
        					->paginate(5)
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
        try{
            Cargo::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
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
