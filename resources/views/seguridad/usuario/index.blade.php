@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-md-12">
	  <div class="box box-purple">
	    <div class="box-header winth-border with-border-purple">
	      <h3 class="box-title">Acceso - Usuario</h3>
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
		              <div class="col-sm-8 col-xs-12">
		                <h3>Listado de Usuario 
		                	<a href="usuario/create"><button class="btn btn-success">Nuevo</button></a> 
		                	<a href="{{ URL::to('usuarioPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
		                </h3>
		               @include('seguridad.usuario.search')
		              </div>
		            </div>

		            <div class="row">
		              <div class="col-xs-12">
		                <div class="table-responsive">
		                  <table class="table table-striped table-bordered table-condensed table-hover">
							    <thead>
							      <th>Id</th>
							      <th>Nombre</th>
							      <th>Email</th>
							      <th>Opciones</th>
							    </thead>
							    @foreach ($usuarios as $usu)
							    <tr>
							      <td>{{ $usu->id}}</td>
							      <td>{{ $usu->name}}</td>
							      <td>{{ $usu->email}}</td>
							      <td>
							        <a href="{{URL::action('UsuarioController@edit', $usu->id)}}"><button class="btn btn-info">Editar</button></a>
							        <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a>
							      </td>
							    </tr>
							    @include('seguridad.usuario.delete')
							    @endforeach
							</table>
		                </div>
		                {{ $usuarios->render()}}
		              </div>
		            </div>
	            
	            <!--Fin Contenido-->
	      		</div>
	      	</div><!-- /.row -->
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@stop