@extends('layouts.admin')
@section('headder')
<h1>Ingreso de Articulos<small>Nuevo Ingreso de Articulos</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('compras/ingreso') }}"><i class="fa fa-th"></i> Ingreso de Articulos</a></li>
  <li class="active">Nuevo Ingreso de Articulos</li>
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
	          		@can('ingreso.create')
	                <!--Contenido-->
		            <div class="row">
		            	<div class="col-xs-12 col-sm-6">
		            		<h3>Nuevo Ingreso</h3>
		            		@if(count($errors)>0)
		            		<div class="alert alert-danger">
		            			<ul>
		            				@foreach($errors->all() as $error)
		            				<li>{{$error}}</li>
		            				@endforeach
		            			</ul>
		            		</div>
		            		@endif
		            	</div>
		            </div>
            		{!! Form::open(['url' => 'compras/ingreso', 'method' => 'POST', 'autocomplete' => 'off']) !!}
            		{{ Form::token() }}
		            <div class="row">
		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="proveedor">Proveedor</label>
		            			<select name="proveedor" id="proveedor" class="form-control selectpicker" data-live-search="true">
		            				@foreach($personas as $persona)
		            				<option value="{{ $persona->Pers_codi }}">{{ $persona->Pers_nomb }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="serie_comprobante">Serie Comprobante</label>
		            			<input type="text" name="serie_comprobante" value="002-001"  class="form-control" placeholder="Serie Comprobante...">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="numero_comprobante">Número Comprobante</label>
		            			<input type="text" name="numero_comprobante" required value="{{ old('numero_comprobante') }}" class="form-control" placeholder="Número Comprobante...">
		            		</div>
		            	</div>
		            </div>
		            	
		            <div class="row">
		            	<div class="col-xs-12">
			            	<div class="panel panel-primary">
			            		<div class="panel-body">
		            				<div class="form-group">
		            					<div class="col-xs-12 col-sm-3">
			            					<label>Articulo</label>
			            					<select name="articulo" class="form-control selectpicker" id="articulo" data-live-search="true">
			            						@foreach($articulos as $articulo)
					            				<option value="{{ $articulo->Arti_codi }}">{{ $articulo->articulo }}</option>
					            				@endforeach
			            					</select>
		            					</div>
		            					<div class="col-xs-12 col-sm-3">
		            						<div class="form-group">
		            							<label for="cantidad">Cantidad</label>
		            							<input type="number" name="cantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
		            						</div>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<label for="precio_compra">Precio Compra</label>
		            							<input type="number" name="precio_compra" id="pprecio_compra" class="form-control" placeholder="P. Compra...">
		            						</div>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<label for="precio_venta">Precio Venta</label>
		            							<input type="number" name="precio_venta" id="pprecio_venta" class="form-control" placeholder="P. Venta...">
		            						</div>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<center><button type="button" id="bt_add" class="btn btn-primary">Agregar</button></center>
		            						</div>
		            					</div>
		            					<div class="col-xs-12 ">
		            						<div class="table-responsive">
		            							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
		            								<thead style="background-color: #A9D0F5">
		            									<th>Opciones</th>
		            									<th>Articulos</th>
		            									<th>Cantidad</th>
		            									<th>Precio Compra</th>
		            									<th>Precio Venta</th>
		            									<th>Subtotal</th>
		            								</thead>
		            								<tfoot>
		            									<th>TOTAL</th>
		            									<th></th>
		            									<th></th>
		            									<th></th>
		            									<th></th>
		            									<th><h4 id="total">$/. 0.00</h4><input type="hidden" name="total_ingreso" id="total_ingreso"></th>
		            								</tfoot>
		            								<tbody>
		            									
		            								</tbody>
		            							</table>
		            						</div>
		            					</div>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6" id="guardar">
		            		<div class="form-group">
		            			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            			<button class="btn btn-primary" type="submit">Guardar</button>
		            			<button class="btn btn-danger" type="reset">Cancelar</button>
		            		</div>
		            	</div>
		            </div>
	            	{!! Form::close() !!}
	            @push('script')
	            <script>
	            	$(document).ready(function(){
	            		$('#bt_add').click(function(){
	            			agregar();
	            		});
	            	});
	            	var cont=0;
	            	total=0;
	            	subtotal=[];
	            	$('#guardar').hide();
	            	function agregar(){
	            		idarticulo=$("#articulo").val();
	            		articulo=$("#articulo option:selected").text();
	            		cantidad=$("#pcantidad").val();
	            		precio_compra=$("#pprecio_compra").val();
	            		precio_venta=$("#pprecio_venta").val();
	            		if (idarticulo!="" && cantidad!="" && cantidad>0 &&precio_venta!="" && precio_compra!="") {
	            			subtotal[cont]=(cantidad*precio_compra);
	            			total=total+subtotal[cont];
	            			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="articulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td>></tr>'
	            			cont++;
	            			limpiar();
	            			$("#total").html("$/. " + total);
	            			$("#total_ingreso").val(total);
	            			evaluar();
	            			$('#detalles').append(fila);
	            		}
	            		else {
	            			alert("Erro al ingresar el detalle del ingreso, revise los datos del articulo");
	            		}
	            	}
	            	function limpiar(){
	            		$("#pcantidad").val("");
	            		$("#pprecio_compra").val("");
	            		$("#pprecio_venta").val("");
	            	}
	            	function evaluar(){
	            		if (total>0) {
	            			$("#guardar").show();
	            		}
	            		else {
	            			$("#guardar").hide();
	            		}
	            	}
	            	function eliminar(index){
	            		total=total-subtotal[index];
	            		$("#total").html("$/. " + total);
	            		$("#total_ingreso").val(total);
	            		$("#fila" + index).remove();
	            		evaluar();
	            	}
	            	
	            </script>
	            @endpush
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
@stop