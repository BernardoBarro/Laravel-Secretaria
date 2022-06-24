@extends('adminlte::page')

@section('content')
    <h3>Edição do(a) Associado(a) : {{ $associado->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['associado.update', 'id'=>$associado->id], 'method'=>'put']) !!}

        <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $associado->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', $associado->email, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('cargo', 'Cargo:') !!}
                {!! Form::select('cargo',
                                  array('Presidente' => 'Presidente',
                                        'Vice-Presidente'  => 'Vice-Presidente',
                                        'Secretario' => 'Secretario'),
                                        'Presidente', ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Associado', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop