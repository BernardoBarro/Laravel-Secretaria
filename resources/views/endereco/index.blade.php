@extends('layouts.default')

@section('content')
	<h1>Endereços Registrados:</h1>

	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'endereco']) !!}
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
			<th>CEP:</th>
			<th>Cidade:</th>
            <th>Bairro:</th>
            <th>Rua:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($endereco as $endereco)
				<tr>
                    <td>{{ $endereco->cep }}</td>
                    <td>{{ $endereco->cidade }}</td>
                    <td>{{ $endereco->bairro }}</td>
                    <td>{{ $endereco->rua }}</td>
					<td>
						<a href="{{ route('endereco.edit', ['id'=>\Crypt::encrypt($endereco->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$endereco->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	

	<a href="{{ route('endereco.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"endereco"
@endsection