@extends('adminlte::page')

@section('content')
    @foreach($projetos as $projeto)
        <li>Nome do Projeto: {{ $projeto->nome }}</li>    
        <li>Descrição: {{ $projeto->descricao }}</li>
        <br>
    @endforeach    
@stop