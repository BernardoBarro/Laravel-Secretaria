@extends('adminlte::page')

@section('content')
    <h3>Edição de Patrocinador {{ $patrocinador->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['patrocinador.update', 'id'=>$patrocinador->id], 'method'=>'put']) !!}

        <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $patrocinador->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('valor', 'Valor:') !!}
                {!! Form::number('valor', $patrocinador->valor, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', $patrocinador->descricao, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Patrocinador', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop