<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instituicao;
use App\Http\Requests\InstituicaoRequest;

class InstituicaoController extends Controller
{
    public function index(){
        $instituicao = Instituicao::All();
        return view('instituicao.index',['instituicaos' =>$instituicao]);
    }

    public function create() {
        return view('instituicao.create');
    }

    public function store(InstituicaoRequest $request) {
        $nova_instituicao = $request->all();
        Instituicao::create($nova_instituicao);
        return redirect()->route('instituicao');
    }

    public function destroy($id) {
        Instituicao::find($id)->delete();
        return redirect()->route('instituicao');
    }

    public function edit(Request $request) {
        $instituicao = Instituicao::find(\Crypt::decrypt($request->get('id')));
        return view('instituicao.edit', compact('instituicao'));
     }

    public function update(InstituicaoRequest $request, $id) {
        Instituicao::find($id)->update($request->all());
       return redirect()->route('instituicao');
    }
}
