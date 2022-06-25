@extends('adminlte::page')

@section('content')
    <h3>Novo Endereço</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'endereco/store']) !!}

        <!-- //Cep -->
        <div class="form-group">
                {!! Form::label('cep', 'Cep:') !!}
                {!! Form::number('cep', null, ['class'=>'form-control', 'required']) !!}
        </div>
    
        <!-- //Cidade -->
        <div class="form-group">
                {!! Form::label('cidade', 'Cidade:') !!}
                {!! Form::text('cidade', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <!-- //Bairro -->
        <div class="form-group">
                {!! Form::label('bairro', 'Bairro:') !!}
                {!! Form::text('bairro', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <!-- //Rua -->
        <div class="form-group">
                {!! Form::label('rua', 'Rua:') !!}
                {!! Form::text('rua', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Endereço', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop