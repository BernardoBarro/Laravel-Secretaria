@extends('adminlte::page')

@section('content')
    @foreach($enderecos as $endereco)
        <li>CEP: {{ $endereco->cep }}</li>    
        <li>Cidade: {{ $endereco->cidade }}</li>
        <li>Bairro: {{ $endereco->bairro }}</li>
        <li>Rua: {{ $endereco->rua }}</li>
        <li>Numero: {{ $endereco->numero }}</li>
        <br>
    @endforeach    
@stop

@section('table-delete')
"endereco"
@endsection