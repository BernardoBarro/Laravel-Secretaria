@extends('adminlte::page')

@section('content')
    <h3>Edição de Projeto: {{ $projeto->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['projeto.update', 'id'=>$projeto->id], 'method'=>'put']) !!}

        <div class="form-group">
                {!! Form::label('nome', 'Nome:') !!}
                {!! Form::text('nome', $projeto->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('descricao', 'Descrição:') !!}
                {!! Form::text('descricao', $projeto->descricao, ['class'=>'form-control', 'required']) !!}
        </div>
        <hr />

        <h4>Instituições</h4>
        <div class="input_fields_wrap_i"></div>
        <br>

        <button style="float:right" class="add_field_button_i btn btn-default">Adicionar Instituição</button>

        <br>
        <hr />
        <hr />

        <h4>Patrocinadores</h4>
        <div class="input_fields_wrap_p"></div>
        <br>

        <button style="float:right" class="add_field_button_p btn btn-default">Adicionar Patrocinador</button>

        <br>
        <hr />

        <div class="form-group">
            {!! Form::submit('Editar Projeto', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        $(document).ready(function(){
            var wrapper = $(".input_fields_wrap_p");
            var add_button = $(".add_field_button_p");
            var x=0;
            $(add_button).click(function(e){
                x++;
                var newField = '<div><div style="width:94%; float:left" id:"patrocinador">{!! Form::select("patrocinadores[]", \App\Models\Patrocinador::orderby("nome")->pluck("nome","id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um patrocinador"]) !!}</div><button type="button" class"remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>
    
    <script>
        $(document).ready(function(){
            var wrapper = $(".input_fields_wrap_i");
            var add_button = $(".add_field_button_i");
            var x=0;
            $(add_button).click(function(e){
                x++;
                var newField = '<div><div style="width:94%; float:left" id:"instituicao">{!! Form::select("instituicoes[]", \App\Models\Instituicao::orderby("nome")->pluck("nome","id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione uma instituição"]) !!}</div><button type="button" class"remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>
@stop