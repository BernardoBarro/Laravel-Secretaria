@extends('adminlte::page')

@section('content')
    <h3>Novo Patrocinador</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'patrocinador/store']) !!}

        <!-- //Nome do Patrocinador -->
        <div class="form-group">
                {!! Form::label('nome', 'Nome do Patrocinador:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
    
        <!-- //Valor a ser contribuido -->
        <div class="form-group">
                {!! Form::label('valor', 'Valor:') !!}
                {!! Form::number('valor', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <!-- //Descrição -->
        <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'required']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Criar Patrocinador', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop