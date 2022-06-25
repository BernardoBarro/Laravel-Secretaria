@extends('layouts.default')

@section('content')
	<h1>Instituições Registradas:</h1>

	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'instituicao']) !!}
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
			<th>Nome da Instituição:</th>
			<th>Contato:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($instituicao as $instituicao)
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