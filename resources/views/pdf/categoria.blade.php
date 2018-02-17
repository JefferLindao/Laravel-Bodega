@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Categoria</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead>
					<tr class="text-center">
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripción</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach ($categorias as $cat) 
				    <tr>
				      <td>{{ $cat->Cate_codi }}</td>
				      <td>{{ $cat->Cate_nomb }}</td>
				      <td>{{ $cat->Cate_desc }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop