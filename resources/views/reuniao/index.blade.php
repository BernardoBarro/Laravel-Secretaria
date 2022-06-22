@extends('adminlte::page')

@section('content')
    @foreach($reuniaos as $reuniao)
        <li>Nome da Reunião: {{ $reuniao->nome }}</li>    
        <li>Assunto: {{ $reuniao->assunto }}</li>
        <li>Local: {{ $reuniao->local }}</li>
        <li>Data da Reunião: {{ $reuniao->dt_reuniao }}</li>
        <br>
    @endforeach    
@stop