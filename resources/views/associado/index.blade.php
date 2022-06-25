@extends('layouts.default')

@section('content')
	<h1>Associados Registrados:</h1>

	<table class="table table-stripe table-bordered table-hover">
		<thead>
			<th>Nome:</th>
            <th>E-mail:</th>
            <th>Cargo:</th>
            <th>Nascimento:</th>
            <th>Admissão:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($associados as $associado)
				<tr>
                    <td>{{ $associado->nome }}</td>
                    <td>{{ $associado->email }}</td>
                    <td>{{ $associado->cargo }}</td>
                    <td>{{ Carbon\Carbon::parse($associado->dt_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($associado->dt_admissao)->format('d/m/Y') }}</td>
					<td>
						<a href="{{ route('associado.edit', ['id'=>\Crypt::encrypt($associado->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$associado->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('associado.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"associado"
@endsection