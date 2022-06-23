@extends('layouts.default')

@section('content')
	<h1>Projetos Registrados:</h1>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
            <th>Projeto n°:</th>
			<th>Nome do Projeto:</th>
			<th>Descrição:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($projetos as $projeto)
				<tr>
                    <td>{{ $projeto->id }}</td>
                    <td>{{ $projeto->nome }}</td>
					<td>{{ $projeto->descricao }}</td>
					<td>
						<a href="{{ route('projeto.edit', ['id'=>\Crypt::encrypt($projeto->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$projeto->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('projeto.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"projeto"
@endsection