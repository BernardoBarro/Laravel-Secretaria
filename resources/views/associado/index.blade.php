@extends('adminlte::page')

@section('content')
    @foreach($associados as $associado)
        <li>Associado: {{ $associado->nome }}</li>    
        <li>Associado: {{ $associado->ocupacao }}</li>
        <br>
    @endforeach    
@stop