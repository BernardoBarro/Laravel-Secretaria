<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Http\Requests\EnderecoRequest;

class EnderecoController extends Controller
{
    public function index(){
        $endereco = Endereco::All();
        return view('endereco.index',['enderecos' =>$endereco]);
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

    public function edit($id) {
       $endereco = Endereco::find($id);
       return view('endereco.edit', compact('endereco'));
    }

    public function update(EnderecoRequest $request, $id) {
       Endereco::find($id)->update($request->all());
       return redirect()->route('endereco');
    }
}
