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
	            		<h3>Editar Articulo: {{ $articulo->Arti_nomb }}</h3>
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
	            		{!! Form::model($articulo, ['method' => 'PATCH', 'route' => ['articulo.update', $articulo->Arti_codi], 'file' => 'true']) !!}
	            		{{ Form::token() }}
        		<div class="row">
	            	<div class="col-xs-12 col-sm-6">
	            		<div class="form-group">
	            			<label for="nombre">Nombre</label>
	            			<input type="text" name="nombre" required value="{{ $articulo->Arti_nomb }}" class="form-control">
	            		</div>
	            	</div>

	            	<div class="col-xs-12 col-sm-6">
	            		<div class="form-group">
	            			<label for="selecategoria">Categoria</label>
	            			<select name="selecategoria" class="form-control">
            				@foreach ($categorias as $cat)
	            				@if ($cat->Cate_codi == $articulo->Cate_codi)
		            				<option value="{{ $cat->Cate_codi }}" selected>{{ $cat->Cate_nomb }}</option>
	            				@else
		            				<option value="{{ $cat->Cate_codi }}">{{ $cat->Cate_nomb }}</option>
	            				@endif
            				@endforeach
	            			</select>
	            		</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-6">
	            		<div class="form-group">
	            			<label for="codigo">Codigo</label>
	            			<input type="text" name="codigo" required value="{{ $articulo->Arti_seri }}" class="form-control">
	            		</div>
	            	</div>
	            	<div class="col-xs-12 col-sm-6">
	            		<div class="form-group">
	            			<label for="descripcion">Descripcion</label>
	            			<input type="text" name="descripcion" value="{{ $articulo->Arti_desc }}" class="form-control" placeholder="Descripcion del articulo...">
	            		</div>
	            	</div>
	            	
	            	<div class="col-xs-12 col-sm-6">
	            		<div class="form-group">
	            			<label>Imagen</label>
	            			<input type="file" name="imagen" class="form-control">
	            			@if(($articulo->Arti_imag)!="")
	            			    <center><img src="{{ asset('img/articulos/'.$articulo->Arti_imag) }}" height="200px" width="200px" class="img-center img-circle" style="margin: 10px"></center>
	            			@endif
	            		</div>
	            	</div>
	            	
	            	<div class="col-xs-12">
	            		<div class="form-group">
	            			<button class="btn btn-primary" type="submit">Guardar</button>
	            			<button class="btn btn-danger" type="reset">Cancelar</button>
	            		</div>
	            	</div>
	            		{!! Form::close() !!}
	            <!--Fin Contenido-->
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection