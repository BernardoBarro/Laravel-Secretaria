@extends('adminlte::page')

@section('content')
    <h3>Editando o Convidado {{ $convidado->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['convidado.update', 'id'=>$convidado->id], 'method'=>'put']) !!}

        <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $convidado->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('telefone', 'Telefone:') !!}
                {!! Form::text('telefone', $convidado->telefone, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Convidado', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop