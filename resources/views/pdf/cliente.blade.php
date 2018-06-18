@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Clientes</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed">
				<thead style="background: rgba(255, 150, 0, 0.3);">
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Numero Doc.</th>
						<th class="text-center">Teléfono</th>
						<th class="text-center">Email</th>
						<th class="text-center">Dirección </th>
					</tr>
				</thead>
				<tbody class="text-justify">
					@foreach ($clientes as $cli) 
				    <tr style="background: rgba(255, 150, 0, 0.1);">
				      <td class="text-center">{{ $cli->Pers_codi }}</td>
				      <td class="text-center">{{ $cli->Pers_nomb }}</td>
				      <td class="text-center"><em>{{ $cli->Pers_tido }}</em> {{ $cli->Pers_nudo }}</td>
				      <td class="text-center">{{ $cli->Pers_tele }}</td>
				      <td class="text-center">{{ $cli->Pers_emai }}</td>
				      <td class="text-center">{{ $cli->Pers_dire }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop