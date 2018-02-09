@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de usuario</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead>
					<tr class="text-center">
						<th>Id</th>
						<th>Nombre</th>
						<th>Usuario</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($usuarios as $usu)
					<tr>
						<td class="text-center">{{ $usu->id }}</td>
						<td>{{ $usu->name }}</td>
						<td>{{ $usu->email }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop