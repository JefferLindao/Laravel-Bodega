@extends('layouts.pdf')
@section('contenido')
<h3 class="text-title text-center">Lista de Categoria</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-striped">
				<thead style="background: rgba(33, 208, 54, 0.3)">
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Descripción</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categorias as $cat) 
				    <tr style="background: rgba(33, 208, 54, 0.1)">
				      <td class="text-center">{{ $cat->Cate_codi }}</td>
				      <td class="text-center">{{ $cat->Cate_nomb }}</td>
				      <td class="text-center">{{ $cat->Cate_desc }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop