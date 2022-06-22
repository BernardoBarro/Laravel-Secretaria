@extends('layouts.default')

@section('content')
    @foreach($associados as $associado)
        <li>Nome: {{ $associado->nome }}</li>    
        <li>Email: {{ $associado->email }}</li>
        <br>
    @endforeach    

    
@stop

@section('table-delete')
"associado"
@endsection
