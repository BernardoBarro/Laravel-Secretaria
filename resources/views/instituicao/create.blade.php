@extends('adminlte::page')

@section('content')
    <h3>Nova Instituição:</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'instituicao/store']) !!}

        <!-- //Nome da Instituição -->
        <div class="form-group">
                {!! Form::label('nome', 'Nome da Instituição:') !!}
                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
    
        <!-- //Contato -->
        <div class="form-group">
                {!! Form::label('contato', 'Contato:') !!}
                {!! Form::text('contato', null, ['class'=>'form-control', 'required']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Criar Instituição', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop