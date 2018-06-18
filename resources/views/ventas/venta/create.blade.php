@extends('layouts.admin')
@section('headder')
<h1>Ventas<small>Nuevo Venta</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('ventas/venta') }}"><i class="fa fa-shopping-cart"></i> Ventas</a></li>
  <li class="active">Nuevo Venta</li>
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
	          		@can('venta.create')
	                <!--Contenido-->
		            <div class="row">
		            	<div class="col-xs-12 col-sm-6">
		            		<h3>Nueva Venta</h3>
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
            		{!! Form::open(['url' => 'ventas/venta', 'method' => 'POST', 'autocomplete' => 'off']) !!}
            		{{ Form::token() }}
		            <div class="row">
		            	<div class="col-xs-12 col-sm-12">
		            		<div class="form-group">
		            			<label for="cliente">Cliente</label>
		            			<select name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true">
		            				@foreach($personas as $persona)
		            				<option value="{{ $persona->Pers_codi }}">{{ $persona->Pers_nomb }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label>Comprobante</label>
		            			<select name="tipo_comprobante" class="form-control">
		            				<option value="Boleta">Boleta</option>
		            				<option value="Factura">Factura</option>
		            				<option value="Ticket">Ticket</option>
		            			</select>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-4">
		            		<div class="form-group">
		            			<label for="serie_comprobante">Serie Comprobante</label>
		            			<input type="text" name="serie_comprobante" value="{{ old('serie_comprobante') }}" class="form-control" placeholder="Serie Comprobante...">
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
		            					<div class="col-xs-12 col-sm-2">
			            					<label>Articulo</label>
			            					<select name="articulo" class="form-control selectpicker" id="articulo" data-live-search="true">
			            						@foreach($articulos as $articulo)
					            				<option value="{{$articulo->Arti_codi}}_{{$articulo->Arti_stoc}}_{{$articulo->precio_promedio}}">{{ $articulo->articulo }}</option>
					            				@endforeach
			            					</select>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<label for="cantidad">Cantidad</label>
		            							<input type="number" name="cantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
		            						</div>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<label for="stock">Stock</label>
		            							<input type="number" name="stock" id="pstock" disabled class="form-control" placeholder="Stock...">
		            						</div>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<label for="precio_venta">Precio Venta</label>
		            							<input type="number" disabled name="precio_venta" id="pprecio_venta" class="form-control" placeholder="P. Venta...">
		            						</div>
		            					</div>
		            					<div class="col-xs-12 col-sm-2">
		            						<div class="form-group">
		            							<label for="descuento">Descuento</label>
		            							<input type="number"  name="descuento" id="pdescuento" class="form-control" placeholder="Descuento...">
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
		            									<th>Precio Venta</th>
		            									<th>Descuento</th>
		            									<th>Subtotal</th>
		            								</thead>
		            								<tfoot>
		            									<th>TOTAL</th>
		            									<th></th>
		            									<th></th>
		            									<th></th>
		            									<th></th>
		            									<th><h4 id="total">$/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
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
	            	$('#articulo').change(mostrarValores);

	            	function mostrarValores()
	            	{
	            		datosArticulo=document.getElementById('articulo').value.split('_');
	            		$("#pprecio_venta").val(datosArticulo[2]);
	            		$("#pstock").val(datosArticulo[1]);
	            	}

	            	function agregar()
	            	{
	            		datosArticulo=document.getElementById('articulo').value.split('_');

	            		idarticulo=datosArticulo[0];
	            		articulo=$("#articulo option:selected").text();
	            		cantidad=parseInt($("#pcantidad").val());
	            		descuento=$("#pdescuento").val();
	            		stock=parseInt($("#pstock").val());
	            		precio_venta=$("#pprecio_venta").val();

	            		if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="" && stock!="") {
	            			if (stock>=cantidad)
	            			{
	            				subtotal[cont]=(cantidad*precio_venta-descuento);
		            			total=total+subtotal[cont];
		            			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="articulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>'
		            			cont++;
		            			limpiar();
		            			$("#total").html("$/. " + total);
		            			$("#total_venta").val(total);
		            			evaluar();
		            			$('#detalles').append(fila);
	            			}
	            			else {
	            				alert("La cantidad a vender supera el stock");
	            			}
	            		}
	            		else {
	            			alert("Error al ingresar el detalle de la venta, revise los datos del articulo");
	            		}
	            	}
	            	function limpiar(){
	            		$("#pcantidad").val("");
	            		$("#pdescuento").val("");
	            		$("#pstock").val("");
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
	            		$("#total_venta").val(total);
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
@endsection