@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de usuario</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead style="background: rgba(180, 0, 255, 0.3)">
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Rol</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($usuarios as $usu)
					<tr style="background: rgba(180, 0, 255, 0.1)">
						<td class="text-center">{{ $usu->id }}</td>
						<td class="text-center">{{ $usu->name }}</td>
						<td class="text-center">{{ $usu->email }}</td>
						<td class="text-center">{{ $usu->role }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop