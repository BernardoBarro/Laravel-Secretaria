@extends('adminlte::page')

@section('content')
    <h3>Edição da Reunião: {{ $reuniao->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['reuniao.update', 'id'=>$reuniao->id], 'method'=>'put']) !!}

        <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $reuniao->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('assunto', 'Assunto:') !!}
                {!! Form::text('assunto', $reuniao->assunto, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('local', 'Local:') !!}
                {!! Form::text('local', $reuniao->local, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
                {!! Form::label('dt_reuniao', 'Data da reunião:') !!}
                {!! Form::date('dt_reuniao', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Reunião', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop