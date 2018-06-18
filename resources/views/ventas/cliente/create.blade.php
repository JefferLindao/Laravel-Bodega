@extends('layouts.admin')
@section('headder')
<h1>Clientes<small>Nuevo Cliente</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('ventas/cliente') }}"><i class="fa fa-shopping-cart"></i> Clientes</a></li>
  <li class="active">Nuevo Cliente</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-orange">
	    <div class="box-header winth-border with-border-orange">
	      <h3 class="box-title">Ventas - Clientes</h3>
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
		            		<h3>Nuevo Cliente</h3>
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
	            		{!! Form::open(['url' => 'ventas/cliente', 'method' => 'POST', 'autocomplete' => 'off']) !!}
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
		            			<label for="direccion">Direccion</label>
		            			<input type="text" name="direccion" required value="{{ old('direccion') }}" class="form-control" placeholder="Direccion...">
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="tipo_documento">Documento</label>
		            			<select name="tipo_documento">
		            				<option value="DNI">DNI</option>
		            				<option value="RUC">RUC</option>
		            				<option value="PAS">PAS</option>
		            			</select>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="numero_documento">Número de documento</label>
		            			<input type="text" name="numero_documento" value="{{ old('numero_documento') }}" class="form-control" placeholder="Número de documento...">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="telefono">Teléfono</label>
		            			<input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Teléfono...">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="email">Email</label>
		            			<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email...">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
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