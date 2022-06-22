@extends('layouts.default')

@section('content')
    @foreach($associados as $associado)
        <li>Nome: {{ $associado->nome }}</li>    
        <li>Ocupação: {{ $associado->ocupacao }}</li>
        <br>
    @endforeach    

    
    <!-- <a href="{{ route('associado.edit', ['id'=>$associado->id]) }}" class="btn-sm btn-success">Editar</a>
    <a href="#" onclick="return ConfirmaExclusao({{$associado->id}})" class="btn-sm btn-danger">Remover</a>
    <a href="{{ route('associado.create', []) }}" class="btn btn-info">Adicionar</a> -->
@stop

@section('table-delete')
"associado"
@endsection
