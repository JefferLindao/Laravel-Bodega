@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-green">
	    <div class="box-header winth-border with-border-green">
	      <h3 class="box-title">Almacen - Categorias</h3>
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
	            		<h3>Nueva Categoria</h3>
	            		@if(count($errors)>0)
	            		<div class="alert alert-danger">
	            			<ul>
	            				@foreach($errors->all() as $error)
	            				<li>{{$error}}</li>
	            				@endforeach
	            			</ul>
	            		</div>
	            		@endif

	            		{!! Form::open(['url' => 'almacen/categoria', 'method' => 'POST', 'autocomplete' => 'off']) !!}
	            		{{ Form::token() }}
	            		<div class="form-group">
	            			<label for="nombre">Nombre</label>
	            			<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
	            		</div>
	            		<div class="form-group">
	            			<label for="descripcion">Descripcion</label>
	            			<input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">
	            		</div>
	            		<div class="form-group">
	            			<button class="btn btn-primary" type="submit">Guardar</button>
	            			<button class="btn btn-danger" type="reset">Cancelar</button>
	            		</div>
	            		{!! Form::close() !!}
	            	</div>
	            </div>
	            <!--Fin Contenido-->
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection