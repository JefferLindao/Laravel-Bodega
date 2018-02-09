@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Articulo</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead>
					<tr class="text-center">
						<th>Id</th>
						<th>Nombre</th>
						<th>Codigo</th>
						<th>Categoria</th>
						<th>Stock</th>
						<th>Imagen</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($articulos as $art) 
				    <tr>
				      <td>{{ $art->Arti_codi }}</td>
				      <td>{{ $art->Arti_nomb }}</td>
				      <td>{{ $art->Arti_seri }}</td>
				      <td>{{ $art->Cate_codi }}</td>
				      <td>{{ $art->Arti_stoc }}</td>
				      <td>
				      	<img src="../../../public/img/articulos/.{{ $art->Arti_imag}}"  height="100px" width="100px">
				      </td>
				      <td>{{ $art->Arti_esta}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop