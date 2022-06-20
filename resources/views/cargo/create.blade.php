@extends('adminlte::page')

@section('content')
    <h3>Novo Cargo</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'cargo/store']) !!}

        <!-- //Cargo -->
        <div class="form-group">
                {!! Form::label('cargo', 'Cargo:') !!}
                {!! Form::select('cargo',
                                  array('Presidente' => 'Presidente',
                                        'Vice-Presidente'  => 'Vice-Presidente',
                                        'Secretario' => 'Secretario'),
                                    'Presidente', ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Criar Cargo', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
        
    {!! Form::close() !!}
@stop