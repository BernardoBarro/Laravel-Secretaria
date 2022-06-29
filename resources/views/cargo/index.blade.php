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
			<th>Cargo:</th>
			<th>Descrição:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($cargo as $c)
				<tr>
                    <td>{{ $c->nome }}</td>
                    <td>{{ $c->descricao }}</td>
					<td>
						<a href="{{ route('cargo.edit', ['id'=>\Crypt::encrypt($c->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$c->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $cargo->links("pagination::bootstrap-4") }}

	<a href="{{ route('cargo.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"cargo"
@endsection