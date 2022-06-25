@extends('adminlte::page')

@section('content')
    <h3>Editando o Endereço de CEP n°: {{ $endereco->cep }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['endereco.update', 'id'=>$endereco->id], 'method'=>'put']) !!}

        <div class="form-group">
                {!! Form::label('cep', 'CEP:') !!}
                {!! Form::text('cep', $endereco->cep, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('cidade', 'Cidade:') !!}
                {!! Form::text('cidade', $endereco->cidade, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
                {!! Form::label('bairro', 'Bairro:') !!}
                {!! Form::text('bairro', $endereco->bairro, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('rua', 'Rua:') !!}
                {!! Form::text('rua', $endereco->rua, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Endereço', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop