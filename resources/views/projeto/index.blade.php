@extends('layouts.default')

@section('content')
	<h1>Projetos Registrados:</h1>

	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'projeto']) !!}
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
			<th>Nome do Projeto:</th>
			<th>Descrição:</th>
			<th>Instituições:</th>
			<th>Patrocinadores:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($projeto as $p)
				<tr>
                    <td>{{ $p->nome }}</td>
					<td>{{ $p->descricao }}</td>
					<td>
						@foreach($p->instituicoes as $i)
							<li>{{ $i->nome}}</li>
						@endforeach
					</td>
					<td>
						@foreach($p->patrocinadores as $pa)
							<li>{{ $pa->nome}}</li>
						@endforeach
					</td>
					<td>
						<a href="{{ route('projeto.edit', ['id'=>\Crypt::encrypt($p->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$p->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $projeto->links("pagination::bootstrap-4") }}

	<a href="{{ route('projeto.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"projeto"
@endsection