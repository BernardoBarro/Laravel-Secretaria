@extends('adminlte::page')

@section('content')
    @foreach($cargos as $cargo)
        <li>Cargo: {{ $cargo->nome }}</li>    
        <br>
    @endforeach    
@stop

@section('table-delete')
"cargo"
@endsection