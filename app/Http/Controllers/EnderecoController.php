<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Http\Requests\EnderecoRequest;

class EnderecoController extends Controller
{
    public function index(Request $filtro) {
		$filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null) {
    		$enderecos = Endereco::orderBy('cidade')->paginate(5);
            return view('endereco.index', ['endereco'=>$enderecos]);
        }
        else
            $enderecos = Endereco::where('cidade', 'like', '%'.$filtragem.'%')
        					->orderBy("cidade")
        					->paginate(5)
                            ->setpath('endereco?desc_filtro='.$filtragem);
		return view('endereco.index', ['endereco'=>$enderecos]);
	}

    public function create() {
        return view('endereco.create');
    }

    public function store(EnderecoRequest $request) {
        $novo_endereco = $request->all();
        Endereco::create($novo_endereco);
        return redirect()->route('endereco');
    }

    public function destroy($id) {
        try{
            Endereco::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $endereco = Endereco::find(\Crypt::decrypt($request->get('id')));
        return view('endereco.edit', compact('endereco'));
     }

    public function update(EnderecoRequest $request, $id) {
       Endereco::find($id)->update($request->all());
       return redirect()->route('endereco');
    }
}
