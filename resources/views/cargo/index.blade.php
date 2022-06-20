@extends('adminlte::page')

@section('content')
    @foreach($cargos as $cargo)
        <li>Cargo: {{ $cargo->cargo }}</li>    
        <br>
    @endforeach    
@stop