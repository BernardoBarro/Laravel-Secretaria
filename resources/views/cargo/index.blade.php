@extends('layouts.default')

@section('content')
	<h1>Cargos Registrados:</h1>

	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'cargo']) !!}
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
			<th>Nome do Cargo:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($cargo as $cargo)
				<tr>
                    <td>{{ $cargo->nome }}</td>
					<td>
						<a href="{{ route('cargo.edit', ['id'=>\Crypt::encrypt($cargo->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$cargo->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('cargo.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"cargo"
@endsection