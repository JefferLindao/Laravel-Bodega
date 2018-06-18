
<section>
	<div class="box text-right">
	    <button class="btn btn-box-tool" onclick="javascript:$('.div_modal').click();"><i class="fa fa-times text-red"></i></button>
	</div>
    @can('rol.create')
	<div class="col-md-12">
	    <div class="box box-primary  box-gris">
            <div class="box-header with-border my-box-header">
                <h3 class="box-title"><strong>Nuevo Rol</strong></h3>
            </div><!-- /.box-header -->
	        <div class="box-body">  
	            <form   action="{{ url('crear_rol') }}"  method="post" id="f_crear_rol" class="formentrada"  >
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
	                
	                <div class="col-md-12">	  
		                <div class="form_group form-group">
							<label class="col-sm-2" for="apellido">Nombre del Rol*</label>
		                    <div class="col-sm-10" >
								<input type="text" class="form_control form-control" id="rol_nombre" name="rol_nombre" " required >
		                    </div>
						</div><!-- /.form-group -->
				    </div><!-- /.col -->

				    <div class="col-md-12">	  
		                <div class="form_group form-group">
							<label class="col-sm-2" for="apellido">Slug*</label>
		                    <div class="col-sm-10" >
								<input type="text" class="form_control form-control" id="rol_slug" name="rol_slug" " required >
		                    </div>
						</div><!-- /.form-group -->
				    </div><!-- /.col -->

				    <div class="col-md-12">	  
		                <div class="form_group form-group">
							<label class="col-sm-2" for="apellido">Descripcion*</label>
		                    <div class="col-sm-10" >
								<input type="text" class="form_control form-control" id="rol_descripcion" name="rol_descripcion" " required >
		                    </div>
						</div><!-- /.form-group -->

				    </div><!-- /.col -->


	                <div class="box-footer col-xs-12 box-gris text-center">
	                        <button type="submit" class="btn btn-primary">Crear Nuevo Rol</button>
	                </div>
	            </form>
	        </div>
	    </div>                  
	</div>
    @endcan

	<div class="col-md-12">
	    <div class="table-responsive" >
	    	<h3>Listado de usuario</h3>
		    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>codigo</th>
						<th>nombre</th>
						<th>slug</th>
						<th>descripcion</th>
						@can('usuario.delete')
						<th>Acción</th>
						@endcan
					</tr>
				</thead>
		        <tbody>
				    @foreach($roles as $rol)
					<tr role="row" class="odd" id="filaR_{{  $rol->id }}">
						<td>{{ $rol->id }}</td>
						<td><span class="label label-default">{{ $rol->name or "Ninguno" }}</span></td>
						<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $rol->slug  }}</a></td>
						<td>{{ $rol->description }}</td>
						 @can('usuario.delete')
						<td>
							<button type="button" class="btn btn-danger" onclick="borrar_rol({{ $rol->id }});">Eliminar</button>
						</td>
						@endcan
					</tr>
				    @endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
