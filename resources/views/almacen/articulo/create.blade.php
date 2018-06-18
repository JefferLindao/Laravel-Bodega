@extends('layouts.admin')
@section('headder')
<h1>
  Articulo
  <small>Nuevo Articulo</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('almacen/articulo') }}"><i class="fa fa-laptop"></i> Articulos</a></li>
  <li class="active">Nuevo Articulo</li>
</ol>
@stop
@section('contenido')

<div class="row">
	<div class="col-md-12">
	  <div class="box box-green">
	    <div class="box-header winth-border with-border-green">
	      <h3 class="box-title">Almacen - Articulo</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
	        
	        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      	<div class="row">
	          	<div class="col-md-12">
		          	@can('articulo.create')
		            <!--Contenido-->
		            <div class="row">
		            	<div class="col-xs-12 col-sm-6">
		            		<h3>Nuevo Articulo</h3>
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
	            		{!! Form::open(['url' => 'almacen/articulo', 'method' => 'POST', 'autocomplete' => 'off', 'files' => 'true']) !!}
	            		{{ Form::token() }}
		            <div class="row">
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="nombre">Nombre</label>
		            			<input type="text" name="nombre" required value="{{ old('nombre') }}" class="form-control" placeholder="Nombre...">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="selecategoria">Categoria</label>
		            			<select name="selecategoria" class="form-control selectpicker" data-live-search="true">
		            				@foreach ($categorias as $cat)
		            				<option value="{{ $cat->Cate_codi }}">{{ $cat->Cate_nomb }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
				                <label>Fecha de Caducidad:</label>
	
				                <div class="input-group ">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="date"  name="fecha" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
				                </div>
				                <!-- /.input group -->
			              </div>
			              <!-- /.form group -->
			            </div>
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="descripcion">Descripcion</label>
		            			<input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripcion del articulo...">
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
				            	<label for="codigo">Código</label>
				            	<input type="text" name="codigo" id="codigobar" required value="{{ old('codigo') }}" class="form-control" placeholder="Código del artículo...">
				                <br>
				                <div class="text-center">
					               <button class="btn btn-success text-center" type="button" onclick="generarBarcode()">Generar</button>
					               <button class="btn btn-info text-center" onclick="imprimir()"type="button">imprimir</button>
				                </div>
				                <div id="print" class="text-center">
				                    <svg id="barcode"></svg>
				                </div>
						           
						       
				            		@push('script')
				            		<script>
										function generarBarcode()
										{   
										    codigo=$("#codigobar").val();
										    JsBarcode("#barcode", codigo, {
										    font: "OCRB",
										    fontSize: 18,
										    textMargin: 0
										    });
										}
										$('#liAlmacen').addClass("treeview active");
										$('#liArticulos').addClass("active");



										//Código para imprimir el svg
										function imprimir()
										{
										    $("#print").printArea();
										}

									</script>
									@endpush
					            	
				            
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="imagen">Imagen</label>
		            			<input type="file" name="imagen" class="form-control">
		            		</div>
		            	</div>
		            	<div class="col-xs-12">
		            		<div class="form-group">
		            			<button class="btn btn-primary" type="submit">Guardar</button>
		            			<button class="btn btn-danger" type="reset">Cancelar</button>
		            		</div>
		            	</div>
	            		{!! Form::close() !!}
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

