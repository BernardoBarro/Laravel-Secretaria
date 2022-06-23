@extends('layouts.default')

@section('content')
	<h1>Convidados Registrados:</h1>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
			<th>Nome do Convidado:</th>
			<th>Telefone:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($convidados as $convidado)
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