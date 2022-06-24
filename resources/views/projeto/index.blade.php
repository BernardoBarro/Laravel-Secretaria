@extends('adminlte::page')

@section('content')
    @foreach($projetos as $projeto)
        <li>Nome do Projeto: {{ $projeto->nome }}</li>    
        <li>Descrição: {{ $projeto->descricao }}</li>
        @foreach($projeto->instituicoes as $i)
            <li>
                {{ $i->instituicao->nome}}
            </li>
        @endforeach
        @foreach($projeto->patrocinadores as $p)
            <li>
                {{ $p->patrocinador->nome}}
            </li>
        @endforeach
        <br> 
    @endforeach    
@stop

@section('table-delete')
"projeto"
@endsection