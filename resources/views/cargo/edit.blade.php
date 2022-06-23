@extends('adminlte::page')

@section('content')
    <h3>Editando o Cargo de {{ $cargo->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['cargo.update', 'id'=>$cargo->id], 'method'=>'put']) !!}

    <div class="form-group">
                {!! Form::label('nome', 'Come:') !!}
                {!! Form::select('nome',
                                  array('Presidente' => 'Presidente',
                                        'Vice-Presidente'  => 'Vice-Presidente',
                                        'Secretario' => 'Secretario'),
                                        'Presidente', ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('descricao', 'Data de alteração:') !!}
                {!! Form::text('descricao', $cargo->descricao, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Cargo', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop