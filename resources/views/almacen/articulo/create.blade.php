@extends('layouts.admin')
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
		            			<label for="codigo">Codigo</label>
		            			<input type="text" name="codigo" required value="{{ old('codigo') }}" class="form-control" placeholder="Codigo del articulo...">
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="descripcion">Descripcion</label>
		            			<input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripcion del articulo...">
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
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection