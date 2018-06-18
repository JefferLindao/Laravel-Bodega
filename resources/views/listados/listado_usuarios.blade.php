@extends('layouts.admin')
@section('headder')
<h1>
  Usuarios
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('seguridad') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-user-o"></i> Usuarios</li>
</ol>
@stop
@section('contenido')
<div class="row">
	<section class="col-md-12" id="contenido_principal">
		<div class="box box-purple">
			<div class="box-header winth-border with-border-purple">
		        <h4 class="box-title">Listado de Usuarios</h4>
		        <div class="box-tools pull-right">
			        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-blue"></i></button>
			        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times text-red"></i></button>
			    </div>
		    </div>
			<div class="box-body box-white">
				<div class="row">
					<div class="col-xs-6">
						<div class="margin" id="botones_control">
							@can('usuario.create')
							<a href="javascript:void(0);" class="btn btn-success" onclick="cargar_formulario(1);">Nuevo</a>
							@endcan
		                	@can('reporte.usuario')
							<a href="{{ URL::to('usuarioPDF') }}" class="btn btn-social-icon btn-google" title="Reporte" ><i class="fa fa-file-pdf-o"></i></a>
							@endcan
						</div>
					</div>
					<div class="col-xs-6 text-right">
						<div class="margin" id="botones_control">
							@can('rol.index')
							<a href="javascript:void(0);" class="btn btn-primary" onclick="cargar_formulario(2);">Roles</a>
							<a href="javascript:void(0);" class="btn btn-primary" onclick="cargar_formulario(3);" >Permisos</a>
							@endcan
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<form action="{{ url('buscar_usuario') }}"  method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required placeholder="Buscar...">
									<span class="input-group-btn"><input type="submit" class="btn btn-primary" value="Buscar"></span>
								</div>	
							</div>			
						</form>
					</div>
				</div>
					
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
						    <table  class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>codigo</th>
										<th>Rol</th>
										<th>Nombre</th>
										<th>Email</th>
										 @canatleast(['usuario.edit', 'usuario.delete'])
									    <th>Acción</th>
									    @endcanatleast
									</tr>
								</thead>
						        <tbody>
								    @foreach($usuarios as $usuario)
									<tr role="row" class="odd">
										<td>{{ $usuario->id }}</td>
										<td><span class="label label-default">
							             
							             @foreach($usuario->getRoles() as $roles)
										 {{  $roles.","  }}
							             @endforeach
							           
							            </span>
										</td>
										<td class="mailbox-messages mailbox-name">{{ $usuario->name  }}</a></td>
										<td>{{ $usuario->email }}</td>
										@canatleast(['usuario.edit', 'usuario.delete'])
										<td>
											@can('usuario.delete')
											<button type="button" class="btn  btn-info" onclick="verinfo_usuario({{  $usuario->id }})" >Editar</button>
											@endcan
									        @can('usuario.delete')
											<button type="button"  class="btn  btn-danger"  onclick="borrado_usuario({{  $usuario->id }});"  >Eliminar</button>
											@endcan
										</td>
										@endcanatleast
									</tr>
								    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
	
			{{ $usuarios->links() }}
	
			@if(count($usuarios)==0)
			<div class="box box-primary col-xs-12">
				<div class='aprobado' style="margin-top:70px; text-align: center">
					<label style='color:#177F6B'>
			              ... no se encontraron resultados para su busqueda...
			        </label> 
			    </div>
			</div> 
			@endif
		</div>
	</section>
</div>
@endsection