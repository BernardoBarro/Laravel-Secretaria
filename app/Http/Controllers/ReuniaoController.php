<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reuniao;
use App\Http\Requests\ReuniaoRequest;

class ReuniaoController extends Controller
{
    public function index(){
        $reuniao = Reuniao::All();
        return view('reuniao.index',['reuniaos' =>$reuniao]);
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

    public function edit($id) {
       $reuniao = Reuniao::find($id);
       return view('reuniao.edit', compact('reuniao'));
    }

    public function update(ReuniaoRequest $request, $id) {
       Reuniao::find($id)->update($request->all());
       return redirect()->route('reuniao');
    }
}
