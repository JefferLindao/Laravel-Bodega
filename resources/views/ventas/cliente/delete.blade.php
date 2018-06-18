<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-5" id="modal-delete-{{$per->Pers_codi}}">
	{!! Form::open(array('action' => array('ClienteController@destroy', $per->Pers_codi), 'method' => 'delete')) !!}
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-red">x</span>
				</button>
				<h4 class="modal-title">Eliminar Cliente</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Cliente</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>