@extends('adminlte::page')

@section('content')
    @foreach($instituicaos as $instituicao)
        <li>Nome da Instituição: {{ $instituicao->nome }}</li>    
        <li>Contato: {{ $instituicao->contato }}</li>
        <br>
    @endforeach    
@stop

@section('table-delete')
"instituicao"
@endsection