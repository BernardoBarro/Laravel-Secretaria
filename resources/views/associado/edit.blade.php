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
                {!! Form::label('cargo_id', 'Cargo:') !!}
                {!! Form::select('cargo_id', \App\Models\Cargo::orderBy('nome')->pluck('nome', 'id')->toArray(),
                    $associado->cargo_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('endereco_id', 'Endereço:') !!}
            {!! Form::select('endereco_id', \App\Models\Endereco::orderBy('cidade')->pluck('cidade', 'id')->toArray(),
                $associado->endereco_id, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', $associado->email, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('dt_nascimento', 'Data de nascimento:') !!}
                {!! Form::date('dt_nascimento', $associado->dt_nascimento, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('dt_admissao', 'Data de admissão:') !!}
                {!! Form::date('dt_admissao', $associado->dt_admissao, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Associado', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop