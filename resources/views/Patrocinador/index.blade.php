@extends('layouts.default')

@section('content')
	<h1>Patrocinadores Registrados:</h1>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
			<th>Nome do Patrocinador:</th>
			<th>Valor Doado:</th>
            <th>Descrição:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($patrocinadores as $patrocinador)
				<tr>
                    <td>{{ $patrocinador->nome }}</td>
                    <td>{{ $patrocinador->valor }}</td>
					<td>{{ $patrocinador->descricao }}</td>
					<td>
						<a href="{{ route('patrocinador.edit', ['id'=>\Crypt::encrypt($patrocinador->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$patrocinador->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('patrocinador.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"patrocinador"
@endsection