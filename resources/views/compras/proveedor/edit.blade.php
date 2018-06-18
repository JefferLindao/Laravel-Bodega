@extends('layouts.admin')
@section('headder')
<h1>Proveedores<small>Editar Proveedor</small></h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('compras/proveedor') }}"><i class="fa fa-th"></i> Proveedores</a></li>
  <li class="active">Editar Proveedor</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<div class="col-md-12">
	  <div class="box box-blue">
	    <div class="box-header winth-border with-border-blue">
	      <h3 class="box-title">Compras - Proveedor</h3>
	      <div class="box-tools pull-right">
	        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
	        
	        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      	<div class="row">
	          	<div class="col-md-12">
	          		@can('proveedor.edit')
	                <!--Contenido-->
		            <div class="row">
		            	<div class="col-xs-12 col-sm-6">
		            		<h3>Editar Proveedor</h3>
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
	            		{!! Form::model($persona, ['method' => 'PATCH', 'route' => ['proveedor.update', $persona->Pers_codi], 'file' => 'true']) !!}
	            		{{ Form::token() }}
		            <div class="row">
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="nombre">Nombre</label>
		            			<input type="text" name="nombre" required value="{{ $persona->Pers_nomb }}" class="form-control" >
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="direccion">Direccion</label>
		            			<input type="text" name="direccion" required value="{{ $persona->Pers_dire }}" class="form-control">
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="tipo_documento">Documento</label>
		            			<select name="tipo_documento" class="form-group">
		            				@if ($persona->Pers_tido == 'DNI')
			            				<option value="DNI" selected>DNI</option>
			            				<option value="RUC">RUC</option>
			            				<option value="PAS">PAS</option>
		            				@elseif ($persona->Pers_tido == 'RUC')
			            				<option value="DNI">DNI</option>
			            				<option value="RUC" selected>RUC</option>
			            				<option value="PAS">PAS</option>
			            			@else ($persona->Pers_tido == 'PAS')
			            				<option value="DNI">DNI</option>
			            				<option value="RUC">RUC</option>
			            				<option value="PAS" selected>PAS</option>
			            			@endif
		            			</select>
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="numero_documento">Número de documento</label>
		            			<input type="text" name="numero_documento" value="{{ $persona->Pers_nudo }}" class="form-control">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="telefono">Teléfono</label>
		            			<input type="text" name="telefono" value="{{ $persona->Pers_tele }}" class="form-control" placeholder="Teléfono...">
		            		</div>
		            	</div>

		            	<div class="col-xs-12 col-sm-6">
		            		<div class="form-group">
		            			<label for="email">Email</label>
		            			<input type="email" name="email" value="{{ $persona->Pers_emai }}" class="form-control" placeholder="Email...">
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