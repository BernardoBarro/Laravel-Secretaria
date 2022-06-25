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
    		$enderecos = \DB::table('endereco')
	            ->select('endereco.*', 'cidade')
	            ->paginate(10);
        }
        else
            $enderecos = Endereco::where('cidade', 'like', '%'.$filtragem.'%')
        					->orderBy("cidade")
        					->paginate(10)
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
        Endereco::find($id)->delete();
        return redirect()->route('endereco');
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
