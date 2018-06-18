<section class="content" >
  <div class="col-md-12">
    <div class="box box-purple">
   
      <div class="box-header with-border with-border-purple">
        <h3 class="box-title"><strong>Nuevo Usuario</strong></h3>
      </div><!-- /.box-header -->
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
       
      <div class="box-body">     
        <form   action="{{ url('crear_usuario') }}"  method="post" id="f_crear_usuario" class="formentrada" >
  				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

          <div class="col-md-6">
            <div class="form_group form-group">
              <label class="col-sm-2" for="nombre">Nombres*</label>
              <div class="col-sm-10" >
                  <input type="text" class="form_control form-control" id="nombres" name="nombres"  required   >
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->  
          <div class="col-md-6">
            <div class="form_group form-group">
              <label class="col-sm-2" for="email">Email*</label>
              <div class="col-sm-10" >
                <input type="email" class="form_control form-control" id="email" name="email"  required >
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
            <div class="form_group form-group">
              <label class="col-sm-2" for="email">Password*</label>
              <div class="col-sm-10" >
                <input type="password" class="form_control form-control" id="password" name="password"  required >
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="box-footer col-xs-12 text-center">
            <button type="submit" class="btn btn-primary">Crear Nuevo Usuario</button>
            <button type="button" class="btn btn-default" onclick="javascript:$('.div_modal').click();" >Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

