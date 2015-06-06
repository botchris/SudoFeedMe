<div class="modal fade bs-example-modal-md create-issue">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<?= $this->Form->create(null, ['type' => 'file', 'url' => ['controller' => 'Issues', 'action' => 'add']]); ?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Registrar Incidencia</h4>
				</div>

				<div class="modal-body container-fluid">
					<div class="row">
						<div class="col-md-5">
							<div class="issue-map-content">
								<div class="gmap" id="issue-map"></div>
							</div>
						</div>
						<div class="col-md-7">
							<p><?= $this->Form->input('description', ['type' => 'textarea', 'label' => 'Descripción *:', 'class' => 'form-control', 'required']); ?></p>
							<p class="help-block">Si lo deseas, puedes añadir una foto de la incidencia:</p>
							<?= $this->Form->input('lat', ['type' => 'hidden', 'id' => 'lat']); ?>
							<?= $this->Form->input('lng', ['type' => 'hidden', 'id' => 'lng']); ?>
							<?= $this->Form->input('track_id', ['type' => 'hidden', 'id' => 'track_id']); ?>
							<p><?= $this->Form->file('image', ['label' => 'Imágen', 'class' => '']); ?></p>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Abrir Incidencia</button>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>