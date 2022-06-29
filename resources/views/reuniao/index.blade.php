@extends('layouts.default')

@section('content')
	<h1>Reuniões Registradas:</h1>

	<!-- Serach Bar -->
	{!! Form::open(['name'=>'form_name', 'route'=>'reuniao']) !!}
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
			<th>Nome da Reunião:</th>
			<th>Assunto:</th>
            <th>Local:</th>
            <th>Data da reunião:</th>
            <th>Ações:</th>
		</thead>

		<tbody>
			@foreach($reuniao as $r)
				<tr>
                    <td>{{ $r->nome }}</td>
					<td>{{ $r->assunto }}</td>
                    <td>{{ $r->local }}</td>
                    <td>{{ Carbon\Carbon::parse($r->dt_reuniao)->format('d/m/Y') }}</td> 
					<td>
						<a href="{{ route('reuniao.edit', ['id'=>\Crypt::encrypt($r->id)]) }}" class="btn-sm btn-success">Editar</a>
						<a href="#" onclick="return ConfirmaExclusao({{$r->id}})"class="btn-sm btn-danger">Remover</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

	{{ $reuniao->links("pagination::bootstrap-4") }}

	<a href="{{ route('reuniao.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"reuniao"
@endsection