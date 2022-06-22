@extends('adminlte::page')

@section('content')
    <h3>Nova Reunião</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'reuniao/store']) !!}

        <!-- //Nome -->
        <div class="form-group">
                {!! Form::label('nome', 'Nome da reunião:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
    
        <!-- //Assunto -->
        <div class="form-group">
                {!! Form::label('assunto', 'Assunto:') !!}
                {!! Form::text('assunto', null, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <!-- //Local -->
        <div class="form-group">
                {!! Form::label('local', 'Local:') !!}
                {!! Form::text('local', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <!-- //Dt_reuniao -->
        <div class="form-group">
                {!! Form::label('dt_reuniao', 'Data da reunião:') !!}
                {!! Form::date('dt_reuniao', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Reunião', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop