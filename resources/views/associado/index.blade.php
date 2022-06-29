@extends('layouts.default')

@section('content')
	<h1>Associados Registrados:</h1>

	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'associado']) !!}
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
			<th>Nome:</th>
            <th>E-mail:</th>
            <th>Cargo:</th>
            <th>Endereço:</th>
            <th>Nascimento:</th>
            <th>Admissão:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($associado as $a)
				<tr>
                    <td>{{ $a->nome }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->cargo->nome }}</td>
                    <td>{{ $a->endereco->cidade }}</td>
                    <td>{{ Carbon\Carbon::parse($a->dt_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($a->dt_admissao)->format('d/m/Y') }}</td>
					<td>
						<a href="{{ route('associado.edit', ['id'=>\Crypt::encrypt($a->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$a->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $associado->links("pagination::bootstrap-4") }}

	<a href="{{ route('associado.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"associado"
@endsection