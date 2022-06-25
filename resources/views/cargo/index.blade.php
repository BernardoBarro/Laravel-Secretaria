@extends('layouts.default')

@section('content')
	<h1>Cargos Registrados:</h1>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
			<th>Cargo:</th>
			<th>Descrição:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($cargos as $cargo)
				<tr>
                    <td>{{ $cargo->nome }}</td>
                    <td>{{ $cargo->descricao }}</td>
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