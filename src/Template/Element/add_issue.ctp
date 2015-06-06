<div class="modal fade bs-example-modal-lg create-issue">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Registrar Incidencia</h4>
			</div>

			<div class="modal-body container-fluid">
				<div class="row">
					<div class="col-md-5">
						<div class="issue-map-content">
							<div id="issue-map"></div>
						</div>
					</div>
					<div class="col-md-7">
						<?= $this->Form->create(null); ?>
							<p><?= $this->Form->input('description', ['type' => 'textarea', 'label' => 'Descripción *', 'class' => 'form-control']); ?></p>
							<p class="help-block">Si lo deseas, puedes añadir una foto de la incidencia:</p>
							<p><?= $this->Form->file('image', ['label' => 'Imágen', 'class' => '']); ?></p>
						<?= $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>