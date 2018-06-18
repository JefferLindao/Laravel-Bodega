@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Proveedores</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead style="background: rgba(53, 98, 246, 0.3)">
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Numero Doc.</th>
						<th class="text-center">Teléfono</th>
						<th class="text-center">Email</th>
						<th class="text-center">Dirección </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($proveedores as $pro) 
				    <tr style="background: rgba(53, 98, 246, 0.1)">
				      <td class="text-center">{{ $pro->Pers_codi }}</td>
				      <td class="text-center">{{ $pro->Pers_nomb }}</td>
				      <td class="text-center"><em>{{ $pro->Pers_tido }}</em> {{ $pro->Pers_nudo }}</td>
				      <td class="text-center">{{ $pro->Pers_tele }}</td>
				      <td class="text-center">{{ $pro->Pers_emai }}</td>
				      <td class="text-center">{{ $pro->Pers_dire }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop