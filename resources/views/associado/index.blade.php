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
			<th>Nome do Associado:</th>
            <th>E-mail:</th>
            <th>Cargo:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($associado as $associado)
				<tr>
                    <td>{{ $associado->nome }}</td>
                    <td>{{ $associado->email }}</td>
                    <td>{{ $associado->cargo }}</td>
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