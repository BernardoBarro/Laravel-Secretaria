@extends('adminlte::page')

@section('content')
    @foreach($convidados as $convidado)
        <li>Nome: {{ $convidado->nome }}</li>    
        <li>Telefone: {{ $convidado->telefone }}</li>
        <br>
    @endforeach    
@stop

@section('table-delete')
"convidado"
@endsection