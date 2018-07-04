<div id="create" class="modal fade modal-slide-in-right" role="dialog"  tabindex="-5">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <button type="button" class="close" data-dismiss="modal">&times;</span>
        </button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group add">
            <div class="row">
              <label class="control-label col-sm-2" for="title">Nombre :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Your Nombre Here" required><br>
                <p class="error error-nomb text-center alert alert-danger hidden" id="success-alert"></p>
              </div>
            </div> 
          </div>
          <div class="form-group">
            <div class="row">
              <label class="control-label col-sm-2" for="body">Descripción:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="descripcion" name="descripcion"
                placeholder="Your Descripción Here" required><br>
                <p class="error error-desc text-center alert alert-danger hidden" id="success-alert"></p>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit" id="add">Crear</button>
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
