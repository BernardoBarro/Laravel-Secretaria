@extends('layouts.default')

@section('content')
    @foreach($associados as $associado)
        <li>Nome: {{ $associado->nome }}</li>    
        <li>Email: {{ $associado->email }}</li>
        <li>Cargo: {{ $associado->cargo->nome }}</li>
        <li>Endereço: {{ $associado->endereco->cidade }}</li>
        <br>
    @endforeach    

    
@stop

@section('table-delete')
"associado"
@endsection
