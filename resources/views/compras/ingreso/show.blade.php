@extends('layouts.admin')
@section('headder')
<h1>Ingreso de Articulos<small>Detalles Ingreso de Articulos</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('compras/ingreso') }}"><i class="fa fa-th"></i> Ingreso de Articulos</a></li>
  <li class="active">Detalles Ingreso de Articulos</li>
</ol>
@stop
@section('contenido')
<div class="row">  
	<div class="col-md-12">
	  <div class="box box-blue">
	    <div class="box-header winth-border with-border-blue">
	      <h3 class="box-title">Compras - Ingresos</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
	        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      	<div class="row">
	          	<div class="col-md-12">
	          		@can('ingreso.show')
	                <!--Contenido-->
		            <div class="row">
		            	<div class="col-xs-12">
		            		<div class="form-group">
		            			<label for="proveedor">Proveedor</label>
		            			<p>{{ $ingreso->Pers_nomb }}</p>
		          	  		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label>Comprobante</label>
		            			<p>{{ $ingreso->Ingr_tico }}</p>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="serie_comprobante">Serie Comprobante</label>
		            			<p>{{ $ingreso->Ingr_seco }}</p>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="numero_comprobante">Número Comprobante</label>
		            			<p>{{ $ingreso->Ingr_nuco }}</p>
		            		</div>
		            	</div>
		            </div>
		            	
		            <div class="row">
		            	<div class="col-xs-12">
			            	<div class="panel panel-primary">
			            		<div class="panel-body">
		            				<div class="form-group">
		            					<div class="col-xs-12 ">
		            						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
		            							<thead style="background-color: #A9D0F5">
		            								<th>Articulos</th>
		            								<th>Cantidad</th>
		            								<th>Precio Compra</th>
		            								<th>Precio Venta</th>
		            								<th>Subtotal</th>
		            							</thead>
		            							<tfoot>
		            								<th></th>
		            								<th></th>
		            								<th></th>
		            								<th style="background-color: rgba(24, 178, 8, 0.4);"><h4>TOTAL</h4></th>
		            								<th style="background-color: rgba(24, 178, 8, 0.4);"><h4>{{ $ingreso->total }}</h4></th>
		            							</tfoot>
		            							<tbody>
		            								@foreach ($detalles as $del)
		            								<tr>
		            									<td>{{ $del->articulo }}</td>
		            									<td>{{ $del->Deti_cant }}</td>
		            									<td>{{ $del->Deti_prec }}</td>
		            									<td>{{ $del->Deti_prev }}</td>
		            									<td>{{ $del->Deti_cant*$del->Deti_prec }}</td>
		            								</tr>
		            								@endforeach
		            							</tbody>
		            						</table>
		            					</div>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            </div>
	            <!--Fin Contenido-->
	            @else
	            <div class="row">
	            	<div class="col-xs-12 text-center">
	            		<h3 style='color:#FA206A'>No tienes permiso para esta sección</h3>
	            	</div>
	            </div>
				@endcan
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection