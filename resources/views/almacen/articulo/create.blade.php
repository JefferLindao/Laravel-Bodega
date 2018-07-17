<div id="create" class="modal fade modal-slide-in-right" role="dialog" tabindex="-5">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-green">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form" enctype="multipart/form-data">
					<img class="profile-user-img img-responsive img-circle caratu" src="" alt="User profile picture" id="ima" hidden><br>
					<div class="form-group id" hidden>
						<div class="row">
							<label class="control-label col-sm-2 id" for="id" hidden>id :</label>
							<div class="col-sm-10">
								<input type="text" class="form-control id" name="id" id="id" placeholder="Nombre..." required hidden disabled>
							</div>
						</div>
					</div>
					<div class="form-group">	
						<div class="row">
							<label class="control-label col-sm-2" for="nombre">Nombre :</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre..." required>
								<p class="error-nomb text-center alert alert-danger hidden" id="success-alert"></p>
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-sm-2" for="descripcion">Descripción:</label>
							<div class="col-sm-10">
								<textarea type="descripcion" class="form-control" id="descripcion" placeholder="Descripción..."></textarea>
								<p class="error-desc text-center alert alert-danger hidden" id="success-alert"></p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-sm-2" for="categoria">Categoría :</label>
							<div class="col-sm-10">
								<select name="selecategoria" id="nomCate" class="form-control selectpicker" data-live-search="true">
									<option value="0">Seleccione una opción</option>
		            				@foreach ($categorias as $cat)
		            				<option value="{{ $cat->Cate_codi }}" id="option">{{ $cat->Cate_nomb }}</option>
		            				@endforeach
		            			</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-sm-2" for="nombre">Caducidad:</label>
							<div class="col-sm-10">
								<div class="input-group">
									<div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                 </div>
					                <input type="date"  name="fecha" id="fecha" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
								</div>
								<p class="error-feve text-center alert alert-danger hidden" id="success-alert"></p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-sm-2" for="imagen">Imagen :</label>
							<div class="col-sm-10">
								<input type="file" name="imagen" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-sm-2" for="codigo">Código :</label>
							<div class="col-sm-10">
								<input type="text" name="codigo" id="codigobar" required class="form-control" placeholder="Código del artículo...">
								<p class="error-codi text-center alert alert-danger hidden" id="success-alert"></p>
							</div>
							
						</div>
					</div>
	                <div class="text-center">
		               <button class="btn btn-success text-center" type="button" onclick="generarBarcode()">Generar</button>
		               <button class="btn btn-info text-center" onclick="imprimir()"type="button">imprimir</button>
	                </div>
				</form>
				<div id="print" class="text-center">
					<svg id="barcode"></svg>
                </div>
			</div>
			<div class="modal-footer">
		        <button class="btn actionBtn" type="submit"></button>
		        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
		    </div>
		</div>
	</div>
</div>

