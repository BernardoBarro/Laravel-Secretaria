@extends('adminlte::page')

@section('content')
    <h3>Novo Projeto</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'projeto/store']) !!}

        <!-- //Nome do projeto -->
        <div class="form-group">
                {!! Form::label('nome', 'Nome do Projeto:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
    
        <!-- //Descrição do projeto -->
        <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Projeto', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop