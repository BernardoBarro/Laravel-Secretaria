@extends('adminlte::page')

@section('content')
    <h3>Novo Convidado</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'convidado/store']) !!}

        <!-- //Nome -->
        <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
    
        <!-- //Telefone -->
        <div class="form-group">
                {!! Form::label('telefone', 'Telefone:') !!}
                {!! Form::text('telefone', null, ['class'=>'form-control', 'required']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Criar Convidado', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop