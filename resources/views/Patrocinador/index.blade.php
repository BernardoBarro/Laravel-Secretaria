@extends('adminlte::page')

@section('content')
    @foreach($patrocinadores as $patrocinador)
        <li>Nome do Patrocinador: {{ $patrocinador->nome }}</li>    
        <li>Valor contribuído: R${{ $patrocinador->valor }}</li>
        <li>Descrição: {{ $patrocinador->descricao }}</li>
        <br>
    @endforeach    
@stop