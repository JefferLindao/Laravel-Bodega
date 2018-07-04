<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div id="suspender">
          <form class="form-horizontal" role="modal">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-2"for="id">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fid" disabled>
                </div>
              </div>
            </div>
          
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-2"for="title">Title</label>
                <div class="col-sm-10">
                <input type="name" class="form-control" id="t">
                </div>
              </div>
            </div>
          
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-2"for="body">Body</label>
                <div class="col-sm-10">
                <textarea type="name" class="form-control" id="b"></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Estas seguro de querer eliminar <span class="title"></span>?
          <span class="hidden idCategoria"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-warning actionBtn" data-dismiss="modal"></button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>