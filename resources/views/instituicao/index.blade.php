@extends('layouts.default')

@section('content')
	<h1>Instituições Registradas:</h1>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
			<th>Nome da Instituição:</th>
			<th>Contato:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($instituicaos as $instituicao)
				<tr>
                    <td>{{ $instituicao->nome }}</td>
					<td>{{ $instituicao->contato }}</td>
					<td>
						<a href="{{ route('instituicao.edit', ['id'=>\Crypt::encrypt($instituicao->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$instituicao->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('instituicao.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"instituicao"
@endsection