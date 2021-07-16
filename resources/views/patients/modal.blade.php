




@section('content')<div class=" modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete"  >
	
{!!Form::open()!!}

		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Paciente</h4>
				</div>
				<div class="modal-body">
					<p>Confirme se Deseja Eliminar Paciente!</p>
				</div>
				<div class="modal-footer">
					<div class="btn-group">
						<button type="button" class="btn-info" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn-danger" data-dismiss="modal">Fechar</button>
					</div>
				</div>
				
			</div>
		</div>
{!!Form::close()!!}

</div>
