@extends('layouts.default')

@section('content')
	<h1>Convidados Registrados:</h1>


	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'convidado']) !!}
		<div calss="sidebar-form">
			<div class="input-group">
				<input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
				<span class="input-group-btn">
                	<button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
              	</span>
			</div>
		</div>
	{!! Form::close() !!}
	<br>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
			<th>Nome do Convidado:</th>
			<th>Telefone:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($convidado as $convidado)
				<tr>
                    <td>{{ $convidado->nome }}</td>
                    <td>{{ $convidado->telefone}}</td>
					<td>
						<a href="{{ route('convidado.edit', ['id'=>\Crypt::encrypt($convidado->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$convidado->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('convidado.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"convidado"
@endsection