@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Articulo</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-condensed table-striped">
				<thead style="background: rgba(33, 208, 54, 0.3)">
					<tr class="text-center">
						<th class="text-center">Id</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Codigo</th>
						<th class="text-center">Categoria</th>
						<th class="text-center">Stock</th>
						<th class="text-center">Estado</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($articulos as $art) 
				    <tr style="background: rgba(33, 208, 54, 0.1)">
				      <td class="text-center">{{ $art->Arti_codi }}</td>
				      <td class="text-center">{{ $art->Arti_nomb }}</td>
				      <td class="text-center">{{ $art->Arti_seri }}</td>
				      <td class="text-center">{{ $art->cate }}</td> 
				      <td class="text-center">{{ $art->Arti_stoc }}</td>
				      <td class="text-center">{{ $art->Arti_esta}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop