@extends('layouts.admin')
@section('headder')
<h1>Ventas<small>Detalle de Venta</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('ventas/venta') }}"><i class="fa fa-shopping-cart"></i> Ventas</a></li>
  <li class="active">Detalle de Venta</li>
</ol>
@stop
@section('contenido')
<div class="row">  
	<div class="col-md-12">
	  <div class="box box-orange">
	    <div class="box-header winth-border with-border-orange">
	      <h3 class="box-title">Ventas</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
	        
	        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      	<div class="row">
	          	<div class="col-md-12">
	          		@can('venta.show')
	                <!--Contenido-->
		            <div class="row">
		            	<div class="col-xs-12">
		            		<div class="form-group">
		            			<label for="proveedor">Cliente</label>
		            			<p>{{ $venta->Pers_nomb }}</p>
		          	  		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label>Comprobante</label>
		            			<p>{{ $venta->Vent_tico }}</p>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="serie_comprobante">Serie Comprobante</label>
		            			<p>{{ $venta->Vent_seco }}</p>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="numero_comprobante">Número Comprobante</label>
		            			<p>{{ $venta->Vent_nuco }}</p>
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
		            								<th>Precio Venta</th>
		            								<th>Descuento</th>
		            								<th>Subtotal</th>
		            							</thead>
		            							<tfoot>
		            								<th></th>
		            								<th></th>
		            								<th></th>
		            								<th style="background-color: rgba(24, 178, 8, 0.4);"><h4>TOTAL</h4></th>
		            								<th style="background-color: rgba(24, 178, 8, 0.4);"><h4>{{ $venta->Vent_tove }}</h4></th>
		            							</tfoot>
		            							<tbody>
		            								@foreach ($detalles as $del)
		            								<tr>
		            									<td>{{ $del->articulo }}</td>
		            									<td>{{ $del->Detv_cant }}</td>
		            									<td>{{ $del->Detv_prev }}</td>
		            									<td>{{ $del->Detv_decu }}</td>
		            									<td>{{ $del->Detv_cant*$del->Detv_prev-$del->Detv_decu }}</td>
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