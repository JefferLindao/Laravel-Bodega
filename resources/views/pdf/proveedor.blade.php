@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Proveedores</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead>
					<tr class="text-center">
						<th>Id</th>
						<th>Nombre</th>
						<th>Dirección</th>
						<th>TipoDoc.</th>
						<th>NumeroDoc.</th>
						<th>Teléfono</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($proveedores as $pro) 
				    <tr>
				      <td>{{ $pro->Pers_codi }}</td>
				      <td>{{ $pro->Pers_nomb }}</td>
				      <td>{{ $pro->Pers_dire }}</td>
				      <td>{{ $pro->Pers_tido }}</td>
				      <td>{{ $pro->Pers_nudo }}</td>
				      <td>{{ $pro->Pers_tele }}</td>
				      <td>{{ $pro->Pers_emai }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop