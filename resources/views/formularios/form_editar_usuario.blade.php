<section>
  <div class="box text-right">
    <button class="btn btn-box-tool" onclick="javascript:$('.div_modal').click();"><i class="fa fa-times text-red"></i></button>
  </div>
  <div class="row" >
    <div class="col-md-12">
      <div id="notificacion_E3" ></div>
      <div id="zona_etiquetas_roles" class="text-center" style="background-color:white; margin-bottom: 10px;" >Roles asignados:
        @foreach($usuario->getRoles() as $rl)
        <span class="label label-warning" style="margin-left:10px;">{{ $rl }} </span> 
        @endforeach
      </div>
      
      <div class="box box-primary box-gris">
        <div class="box-header with-border my-box-header">
            <h3 class="box-title"><strong>Acceso al sistema</strong></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form action="{{ url('editar_acceso') }}"  method="post" id="f_editar_acceso"  class="formentrada">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
            <input type="hidden" name="id_usuario" value="{{ $usuario->id }}">
            <div class="col-md-6">
                <div class="form_group form-group">
                  <label class="col-sm-2" for="nombre">Nombres*</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form_control form-control" id="nombres" name="nombres"  value="{{ $usuario->name }}"  required   >
                  </div>
                </div><!-- /.form-group -->
              </div><!-- /.col --> 
            <div class="col-md-6">
              <div class="form_group form-group">
                <label class="col-sm-2" for="email">Email*</label>
                <div class="col-sm-10" >
                  <input type="email" class="form_control form-control" id="email" name="email" value="{{ $usuario->email  }}" required>
                </div>
              </div><!-- /.form-group -->
            </div><!-- /.col -->

            <div class="col-md-6">
              <div class="form_group form-group">
                <label class="col-sm-2" for="email">Nuevo Password*</label>
                <div class="col-sm-10" >
                  <input type="password" class="form_control form-control" id="password" name="password"  required >
                </div>
              </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class=" col-xs-12 box-gris text-center">
              <button type="submit" class="btn btn-primary">Actualizar Acceso</button>
            </div>
          </form>
        </div>
      </div>

      <div class="box box-primary box-gris">
        <div class="box-header with-border my-box-header">
            <h3 class="box-title"><strong>Asignar rol</strong></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-12">
            <div class="form_group form-group">
              <label class="col-sm-2" for="tipo">Rol a asignar*</label>
              <div class="col-sm-6" >         
                <select id="rol1" name="rol1" class="form_control form-control">
                  @foreach($roles as $rol)
                  <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                  @endforeach
                </select>    
              </div>

              <div class="col-sm-4">
                <button type="button" class="btn btn-xs btn-primary" onclick="asignar_rol({{ $usuario->id }});" >Asignar rol</button>
              </div>
            </div>
          </div>
          <hr>
          <div class="col-md-12">
            <div class="form_group form-group">
              <label class="col-sm-2" for="tipo">Rol a quitar*</label>
              <div class="col-sm-6" >         
                <select id="rol2" name="rol2" class="form_control form-control">
                  @foreach($roles as $rol)
                  <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                  @endforeach
                </select>    
              </div>
              <div class="col-sm-4" >         
                <button type="button" class="btn btn-xs btn-primary" onclick="quitar_rol({{ $usuario->id }});" >Quitar rol</button>    
              </div>
            </div>
          </div>
        </div>
      </div> <!--box -->

    </div>
  </div>
</section>