@extends('adminlte::page')

@section('content')
    @foreach($associados as $associado)
        <li>Nome: {{ $associado->nome }}</li>    
        <li>Ocupação: {{ $associado->ocupacao }}</li>
        <br>
    @endforeach
@stop